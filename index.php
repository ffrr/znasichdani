<?php
$remote		= 'http://www.urtd.net/x/zndlive/';
$local		= 'http://localhost:8888/Work/Znasichdani/live/';
$root		= $_SERVER['SERVER_NAME']=='localhost' ? $local : $remote;

$var1		= !empty($_GET['var1']) ? $_GET['var1'] : 'home';
$var2		= $_GET['var2'];
$var3		= $_GET['var3'];
$q			= $_GET['q'];

if($_POST['submit']) { echo "<SCRIPT LANGUAGE=JavaScript>location='{$root}results?q=$_POST[query]'</SCRIPT>"; }

include('system/data.php');
include('system/functions.php');

?>
<!DOCTYPE HTML>
<html xmlns:fb="http://ogp.me/ns/fb#" class="c<?php echo $id; ?>">

	<head>
		<title>Z našich daní</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
		<link href="favicon.ico" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" href="system/style.css"/>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	</head>
	
	<body><span style="position:fixed; top:0; left:0; z-index:10000; background-color:#fff;"></span>
	
		<div id="fb-root"></div><script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1"; fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
		
		<header>
			<h1><a href="<?php echo $root; ?>">
				<?php sprite('logo'); ?>
				<span>Z našich daní<br><i>Projekt <b>Aliancie Fair-play</b></i></span>
			</a></h1>
			<ul>
				<?php menu($menu); ?>
				<li id="language"><a href="#">EN</a>  <a href="#" class="active">SK</a></li>
			</ul>
			<a href="#" id="toggle-menu" class="mobile"><?php sprite('menu'); ?></a>
		</header>
		
		<main>
			<?php include("pages/$var1.php"); ?>
		</main>
		
		<footer>
			<div class="block">
				<div><b>Aliancia Fair-play<br/>& Firemny-register.sk</b><br/>© 2011–2014</div>
				<span class="desktop">
					<div><b>Aliancia Fair-play</b><br/>Smrečianska 21<br/>811 05 Bratislava</div>
					<div><b>+421 220 739 919</b><br/>V pracovné dni medzi 10.00 a 18.00</div>
					<div><a href="mailto:znasichdani@fair-play.sk">znasichdani@fair-play.sk</a></div>
					<img src="system/open_data_challenge.png" alt="Open Data Challenge 1st Place"/>
				</span>
			</div>
			<ul class="services">
				<li class="mobile"><a href="#">Zobraziť plnú verziu stránky</a></li>
				<?php
				$w = 100/count($services);
				foreach($services as $i) {
					$i		= explode("\t",preg_replace("/\t+/","\t",$i));
					$icon	= sprite($i[0],true);
					echo "<li style=\"width:$w%;\"><a href=\"$i[3]\" style=\"background-color:$i[1];\">$icon <span class=\"desktop\">$i[2]</span></a></li>";
				}
				?>
			</ul>
		</footer>
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="system/jquery.tablesorter.min.js"></script>
		<script type="text/javascript" src="system/jquery.stickem.js"></script>
		<script type="text/javascript" src="system/functions.js"></script>
		
	</body>

</html>