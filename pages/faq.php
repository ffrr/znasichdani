<?php
if(empty($var2)) { $var2 = $faq[0][1]; }


foreach($faq as $i) {
	if($i[1] == $var2) {
		foreach($i[2] as $question => $answer) {
			$answer	= str_replace("\n\n",'</p><p>',$answer);
			$answer	= str_replace("\n",'<br/>',$answer);
			$question = !empty($question) ? "<h3>$question</h3>" : '';
			$answers.= "$question<p>$answer</p>";
		}
		$active = " class=\"active\"";
	} else {
		$active = '';
	}
	$toc.= "<li><a href=\"{$root}faq/$i[1]\"$active>$i[0]</a></li>";
}
?>

<section id="main" class="block">
	<h2 class="offset"><b>FAQ</b></h2>
</section>

<section id="faq">
	<ul class="block"><?php echo $toc; ?></ul>
	<div class="block text">
		<?php echo $answers; ?>
	</div>
</section>