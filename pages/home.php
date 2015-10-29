<section id="main" class="home">
	<h2 class="block">
		<b>Preklepnite si ľudí.</b><br/>
		Zistite, či a za koľko obchodujú so štátom.
	</h2>
	
	<ul id="steps" class="block">
		<li class="active wide">
			<span class="desktop">1</span>
			<form id="search" action="" method="POST">
				<input type="text" name="query" value="Zadajte meno" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
				<input type="submit" name="submit" value="Hľadať"/>
			</form>
			<div id="top-people">
				Najčastejšie vyhľadávané osoby
				<ul>
					<?php foreach($top_people as $i) { $n+=1; echo "<li class=\"n$n\"><a href=\"{$root}profile?q=$i\">$i</a></li>"; } ?>
				</ul>
			</div>
		</li>
		<li class="desktop">
			<span class="desktop">2</span>
			<div>Upresnite výber.</div>
		</li>
		<li class="desktop">
			<span class="desktop">3</span>
			<div>Pozrite, akú hodnotu mali štátne tendre spojené s hľadanou osobou.</div>
		</li>
	</ul>
	
	<a href="https://www.youtube.com/watch?v=oHg5SJYRHA0" id="play" class="fancybox desktop"><?php sprite('play'); ?> Videonávod</a>

</section>

<section id="projects">
	<h2 class="block">Súvisiace projekty</h2>
	<ul class="list">
		<?php
		foreach($projects as $i) {
			$i = explode("\t",preg_replace("/\t+/","\t",$i));
			echo "<li><a href=\"#\"><span><img src=\"content/$i[1]\"></span><strong>$i[0]</strong><br/><br/>$i[2]</a></li>";
		}
		?>
	</ul>
</section>