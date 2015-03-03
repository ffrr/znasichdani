<section id="main" class="block">
	<ul id="steps">
		<li>
			<span class="desktop">1</span>
			<form id="search" action="" method="POST">
				<input type="text" name="query" value="<?php echo $q; ?>"/>
				<input type="submit" name="submit" value="Hľadať"/>
			</form>
		</li>
		<li class="active">
			<span class="desktop">2</span>
			<div>Našli sme <b>15 osôb s menom <?php echo $q; ?></b>. Podľa adresy alebo súvisiacich firiem vyberte osobu, ktorá vás najviac zaujíma.</div>
		</li>
		<li class="desktop">
			<span class="desktop">3</span>
			<div>Pozrite, akú hodnotu mali štátne tendre spojené s hľadanou osobou.</div>
		</li>
	</ul>
</section>

<section id="results">
	<div>
		<ul class="list block">
			<?php
			foreach($results as $i) {
				$active = !isset($active) ? 'active' : '';
				$sum			= comma($i[1]);
				$companies_1	= !empty($i[2]) ? "<div class=\"expand $active\"><a href=\"#\"><b>Firmy, ktoré vyhrali štátne tendre</b> <i>".count(explode(';',$i[2]))."</i></a><div>".str_replace(';','<br/>',$i[2])."</div></div>" : '';
				$companies_0	= !empty($i[3]) ? "<div class=\"expand $active\"><a href=\"#\"><b>Firmy bez tendrov</b> <i>".count(explode(';',$i[3]))."</i></a><div>".str_replace(';','<br/>',$i[3])."</div></div>" : '';
				echo "<li>
					<a href=\"{$root}profile?q=$q\"><b>$q</b> <span>{$sum} €</span><br/><i>$i[0]</i></a>
					<div class=\"meta\">
						$companies_1
						$companies_0
						<div class=\"download icon desktop\"><a href=\"#\">".sprite('download',true)." Export dát <i>CSV</i></a></div>
					</div>
				</li>";
			}
			?>
		</ul>
		<div class="block"><a href="#" class="button">Načítať ďalších 5 výsledkov</a></div>
	</div>
	<div class="block" id="notes">
		<?php
		foreach($notes as $i) {
			$i = explode("\t",preg_replace("/\t+/","\t",$i));
			echo "<p class=\"question\">".sprite('tip',true)." $i[0]</p><p>$i[1]</p>";
		}
		?>
	</div>
</section>

<div class="x">Ak sa nenašli žiadne záznamy:</div>

<section id="main" class="block">
	<form id="search" action="" method="POST">
		<input type="text" name="query" value="<?php echo $q; ?>"/>
		<input type="submit" name="submit" value="Hľadať"/>
	</form>
	<h2>Je nám ľúto, nenašli sme žiadne osoby so zadaným menom. Skontrolujte si, či ste meno napísali správne, alebo skúste hľadať niečo iné.</h2>
	<p>ZnašichDaní.sk vie momentálne vyhľadávať iba osoby. V prípade, že chcete overiť štátne tendre pre firmy, zadajte meno človeka, ktorý vo firme figuruje, alebo skústre vyhľadávať priamo vo <a href="#">Vestníku verejného obstarávania</a>.</p>
</section>