<?php

function menu($menu) {
	global $var1;
	global $root;
	foreach($menu as $var => $val) {
		$active	= $var == $var1 ? 'active' : '';
		$url	= $var == 'help' ? '#' : "{$root}$var";
		$output.= "<li><a href=\"$url\" class=\"$active menu-$var\">$val</a></li>";
	}
	echo $output;
}

function comma($num,$decimal = ',',$thousand = ' ') {
	if(!empty($num)) {
		return(number_format($num,2,$decimal,$thousand));
	} else {
		return("0{$decimal}00");
	}
}

function help($title,$text,$prev = true,$next = true) {
	global $helpID;
	if(!isset($helpID)) { $helpID = 0; }
	$prev	= $prev ? "<a href=\"#\" class=\"icon prev\">".sprite('show-less',true)."Späť</a>" : '';
	$next	= $next ? "<a href=\"#\" class=\"icon next\">Ďalej".sprite('show-more',true)."</a>" : '';
	$end	= "<a href=\"#\" class=\"icon end\">Ukončiť</a>";
	echo "
	<div class=\"help tour desktop\">
		<span>?</span>
		<div id=\"help-$helpID\">
			<strong>$title</strong><br/>$text
			<span>$prev$next$end</span>
			<a href=\"#\" class=\"icon close\">".sprite('close',true)."Zavrieť</a>
		</div>
	</div>";
	$helpID+= 1;
}

function collumns($input) {
	foreach($input as $i) {
		$class = $i == 'Suma zákazky' ? " class=\"right\"" : '';
		$output.= "<th$class>$i</th>";
	}
	return($output);
}

function generateTable($head,$data) {
	echo "<table><thead><tr>".collumns($head)."</tr></thead><tbody>";
	foreach($data as $i) {
		$i = explode("\t",preg_replace("/\t+/","\t",$i));
		echo "<tr>";
		foreach($i as $n) {
			$class = strpos($n,'EUR') || strpos($n,'SKK') ? " class=\"right\"" : '';
			if(strpos($n,'-VZT') || strpos($n,'-VST')) { $n = "<a href=\"#\" class=\"icon\">$n ".sprite('external',true)."</a>"; }
			echo "<td$class>$n</td>";
		}
		echo "</tr>";
	}
	echo "</tbody></table>";
}

function list_companies($data,$label,$limit) {
	if(!empty($data)) {
		$data = explode(';',$data);
		if(count($data) > $limit + 1) {
			$list = implode('<br/>',array_slice($data,0,$limit)).'<br/><span>'.implode('<br/>',array_slice($data,$limit)).'</span>';
		} else {
			$list = implode('<br/>',$data);
		}
		return("<div><b>$label</b> <i>(".count($data).")</i><div>$list</div></div>");
	}
}

function generateSprite() {
	$path = "system/svg/";
	$file = "sprite.svg";
	
	$output = "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
	$output.= "<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">";
	
	foreach (glob($path."*.svg") as $filename) {
		if($filename !== $path.$file) {
			$_filename = explode('/',$filename);
			$svg = simplexml_load_file($filename);
			$svg['id'] = substr($_filename[2],0,strpos($_filename[2],'.'));
			unset($svg['enable-background']);
			unset($svg['width']);
			unset($svg['height']);
			$svg = $svg->asXML();
			$svg = substr($svg,strpos($svg,'<svg'));
			$output.= $svg;
		}
	}

	$output.= "</svg>";

	$fp = fopen($path.$file,'w');
	fwrite($fp,$output);
	fclose($fp);
}


function sprite($id,$return = false) {

	$file	= "system/svg/$id.svg";
	$sprite	= "system/svg/sprite.svg";
	if(file_exists($file)) {
		if(!file_exists($sprite) || filemtime($file) > filemtime($sprite)) {
			generateSprite($id);
		}
		$output = "<svg><use xlink:href=\"system/svg/sprite.svg#$id\"></use></svg>";
		if($return) {
			return($output);
		} else {
			echo($output);
		}
	}
}


function getExtension($filename) {

	$filename	= strtolower($filename);
	$pieces		= explode(".",$filename);
	$extension	= $pieces[count($pieces)-1];
	return($extension);
}


function thumb($source,$width,$height,$crop=false,$color=false) {

	$ext=getExtension($source);
	if(strpos($source,'http://')===0) { echo 'thumb() ERROR: Use relative path!<br/>'; }
	if(file_exists($source) && in_array($ext,array('jpg','jpeg','gif','png'))) {
		ini_set('memory_limit','100M');
		if($crop) { $_crop="_crop"; }
		if($color) { $_color="_$color"; }
		$image=substr(md5(str_replace("../","",$source)),0,10)."_".$width."x".$height.$_crop.$_color.".$ext";
		//
		if($source[0]==".") { $exit="../"; }
		$dir=$exit."content/_thumbs";
		list($w, $h, $t, $a) = getimagesize($source);
		if($w>$width || $h>$height || $crop==true) {
			if(!file_exists("$dir/$image") || @filectime($source)>filectime("$dir/$image")) {
				if($ext=="jpg" || $ext=="jpeg") { $i=imagecreatefromjpeg($source); }
				if($ext=="png") { $i=imagecreatefrompng($source); }
				if($ext=="gif") { $i=imagecreatefromgif($source); }
				$img=imagecreatetruecolor($w,$h);
				imagealphablending($img,false);
				imagesavealpha($img,true);
				imagecopy($img, $i, 0, 0, 0, 0, $w, $h);
				$ratio=$w/$h;
				if(!$crop) {
					if($w>$width || $h>$height) {
						if($w>=$h) {
							$_w=$width; $_h=$_w/$ratio;
							if($_h>$height) { $_h=$height; $_w=$_h*$ratio; }
						} else {
							$_h=$height; $_w=$_h*$ratio;
							if($_w>$width) { $_w=$width; $_h=$_w/$ratio; }
						}
					} else { $_w=$w; $_h=$h; }
					$_x=0; $_y=0;
					$new=imagecreatetruecolor($_w,$_h);
				} else {
					if($width>=$height) {
						$_w=$width; $_h=$_w/$ratio;
						$_x=0; $_y=($height-$_h)/2;
						if($_h<$height) { $_h=$height; $_w=$_h*$ratio; $_x=($width-$_w)/2; $_y=0; }
					} else {
						$_h=$height; $_w=$_h*$ratio;
						$_x=($width-$_w)/2; $_y=0;
						if($_w<$width) { $_w=$width; $_h=$_w/$ratio; $_x=0; $_y=($height-$_h)/2; }
					}
					$new=imagecreatetruecolor($width,$height);
				}
				imagealphablending($new,false);
				imagesavealpha($new,true);
				imagecopyresampled($new, $img, $_x, $_y, 0, 0, $_w, $_h, $w, $h);
				if($ext=="jpg" || $ext=="jpeg") { imagejpeg($new,"$dir/$image",90); }
				if($ext=="png") { imagepng($new,"$dir/$image"); }
				if($ext=="gif") { imagegif($new,"$dir/$image"); }
				imagedestroy($i); imagedestroy($img); imagedestroy($new);
			}
			return "$dir/$image";
		} else {
			return $source;
		}
	} else {
		return "Source ERROR: *{$source}*";
	}
}

?>