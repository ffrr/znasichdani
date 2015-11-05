<section id="main" class="block">
	<h2 class="offset"><b>O projekte</b></h2>
</section>

<section>
	<div class="block text">
		<?php
		foreach($about as $i) {
			$answer	= str_replace("\n\n",'</p><p>',$i[2]);
			$answer	= str_replace("\n",'<br/>',$answer);
			echo "<h3 id=\"$i[1]\">$i[0]</h3><p>$answer</p>";
		}
		?>
	</div>
</section>