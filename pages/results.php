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
			<div>Našli sme <b>15 osôb s menom <?php echo $q; ?></b>. Podľa adresy alebo súvisiacich firiem vyberte osobu, ktorá vás zaujíma.</div>
		</li>
		<li class="desktop">
			<span class="desktop">3</span>
			<div>Pozrite sa, akú hodnotu majú štátne tendre spojené s hľadanou osobou.</div>
		</li>
	</ul>
</section>

<section id="results">
	<div>
		<ul class="list block">
			<?php
			$limit = 5;
			foreach($results as $i) {
				$active = !isset($active) ? 'active' : '';
				$sum			= comma($i[1]);
				//$companies_1	= !empty($i[2]) ? "<div class=\"expand $active\"><a href=\"#\"><b>Firmy, ktoré vyhrali štátne tendre</b> <i>".count(explode(';',$i[2]))."</i></a><div>".str_replace(';','<br/>',$i[2])."</div></div>" : '';
				//$companies_0	= !empty($i[3]) ? "<div class=\"expand $active\"><a href=\"#\"><b>Firmy bez tendrov</b> <i>".count(explode(';',$i[3]))."</i></a><div>".str_replace(';','<br/>',$i[3])."</div></div>" : '';
				$show_all	= count(explode(';',$i[2])) > $limit + 1 || count(explode(';',$i[3])) > $limit + 1 ? "<a href=\"#\" class=\"icon toggle\" data-label_0=\"Zobraziť viac\" data-label_1=\"Zobraziť menej\"></a>" : '';
				echo "<li>
					<a href=\"{$root}profile?q=$q\"><b>$q</b> <span>{$sum} €</span><br/><i>$i[0]</i></a>
					<div class=\"meta\">
						<div class=\"download icon desktop\"><a href=\"#\">".sprite('download',true)." Export dát <i>(CSV)</i></a></div>
						".list_companies($i[2],'Firmy, ktoré vyhrali štátne tendre',$limit)."
						".list_companies($i[3],'Firmy bez tendrov',$limit)."
						$show_all
					</div>
				</li>";
			}
			?>
		</ul>
		<div class="block desktop nav">
			<a href="#"><?php sprite('arrow-left'); ?></a>
			<a href="#" class="active">1</a>
			<a href="#">2</a>
			<a href="#">3</a>
			<a href="#"><?php sprite('arrow-right'); ?></a>
		</div>
		<div class="block mobile">
			<a href="#" class="button">Načítať ďalších 5 výsledkov</a>
		</div>
	</div>
	<div class="block" id="notes">
		<?php
		foreach($notes as $q => $a) {
			$a = str_replace("\n\n",'</p><p>',$a);
			echo "<p class=\"question\">".sprite('tip',true)." $q</p><p>$a</p>";
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
	<h2>Je nám ľúto, nenašli sme žiadne osoby so zadaným menom. Skontrolujte, či ste meno napísali správne, alebo skúste hľadať niečo iné.</h2>
	<p>ZNašichDaní.sk vie momentálne vyhľadávať iba osoby. V prípade, že hľadáte firmu, zadajte meno človeka, ktorý v nej figuruje, alebo skúste vyhľadávať priamo vo <a href="xxx">Vestníku verejného obstarávania</a>.</p>
</section>