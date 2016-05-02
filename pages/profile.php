<?php
foreach($data_graph as $co => $data) { $total+= array_sum($data[0]); }

$limit	= 80; // zoskupí firmy zarábajúce zvyšných (100 - $limit)% do jednej položky
$count	= 4;
$bars	= 25;
$n		= 0;
$year	= $_GET['year'] ? $_GET['year'] : date('Y')-1;
$year_f	= strtotime("$year-01-01");
$year_t	= strtotime("$year-12-31");
$today	= strtotime(date('Y-m-d'));
$year_d = $year_t - $year_f;

foreach($data_graph as $co => $data) {
	$sum			= array_sum($data[0]);
	$percent		= round($sum/$total*100);
	$_sum			= comma($sum).' €';
	$_limit			= $sum_run/$total*100;

	//if($_limit > $limit) {
	if($n >= $count) {
		$group_sum+= $sum;
		$active = '';
		$group_count	+= 1;
		$active			= '';
		$hidden			= 'hidden';
		$toggle			= true;
	} else {
		$active			= 'active';
		$hidden			= '';
	}
	if($n + 1 == count($data_graph) && $group_count == 1) {
		$active			= 'active';
		$hidden			= '';
		$toggle			= false;
	}

	$color	= " style=\"color:#$data_colors[$n]\"";
	$bcolor	= " style=\"background-color:#$data_colors[$n]\"";

	$bullet = "<?xml version=\"1.0\" encoding=\"utf-8\"?><svg version=\"1.0\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" width=\"12px\" height=\"12px\" viewBox=\"0 0 12 12\" enable-background=\"new 0 0 12 12\" xml:space=\"preserve\"><circle cx=\"6\" cy=\"6\" r=\"6\" fill=\"#$data_colors[$n]\"/></svg>";

	// labels
	$labels.= "<li class=\"company $active $hidden\">
		<label>
			<input type=\"checkbox\" name=\"$n\" data-sum=\"$sum\"><b$color>$bullet $co<br/>{$percent}%</b> $_sum
		</label>
	</li>";

	// stripe parts
	$parts.= "<div id=\"part-$n\"$bcolor class=\"$hidden\"></div>";

	// mobile view
	foreach($data[1] as $position => $_ints) {
		$ints	= explode('|',$_ints);
		array_reverse($ints);
		foreach($ints as $int) {
			$int	= explode(':',$int);
			$f		= strtotime($int[0]);
			$t		= !empty($int[1]) ? strtotime($int[1]) : $today;
			if($f <= $year_t && $t >= $year_f) {
				$left	= $year_f >= $f ? 0 : ($f - $year_f) / $year_d * 100;
				$width	= $t >= $year_t ? 100 - $left : ($t - $year_f) / $year_d * 100;
				$timelines.= "<div style=\"background-color:#$data_colors[$n]; left:{$left}%; width:{$width}%;\"></div>";
			}
		}

		$_ints		= explode(':',$_ints);
		$interupted	= count($_ints) > 2 ? ' *' : '';
		$from		= $_ints[0];
		$to			= end($_ints);

		$from = explode('-',$from);
		$from = $from[2].'. '.$from[1].'. '.$from[0];
		if(!empty($to)) {
			$to = explode('-',$to);
			$to = $to[2].'. '.$to[1].'. '.$to[0];
		} else {
			$to = 'súčasnosť';
		}

		$positions.="<li>
			<span><div>$position</div><div class=\"right\">$from — $to$interupted</div></span>
			<div class=\"timeline\">$timelines</div>
		</li>";

		unset($timelines);
	}

	$year_key	= array_search($year,$data_years);
	$year_sum	= $year_key !== false ? comma($data[0][$year_key]).' €' : '0.00 €';
	$year_total+= $year_sum;

	$mobile.= "<li>
		<span><div><b$color>$co</b></div><div class=\"right\"><b$color>{$percent}%</b> $year_sum</div></span>
		<ul class=\"positions\">$positions</ul>
	</li>";
	unset($positions);

	//
	$n			+= 1;
	$sum_run	+= $sum;
}

if($toggle) {

	$labels.= "<li id=\"group\" class=\"company active group\">
		<label>
			<input type=\"checkbox\" name=\"group\" data-sum=\"$group_sum\"><b style=\"color:#fff\">Ostatné firmy <i>$group_count</i><br/>".round($group_sum/$total * 100)."%</b> ".comma($group_sum)." €
		</label>
	</li>";

	$parts.= "<div id=\"part-group\" style=\"background-color:#fff\" class=\"group\"></div>";

	$grouper = "<li class=\"desktop\">
		<a href=\"#\" id=\"break-group\" class=\"icon\">Zobraziť všetky ". sprite('show-more',true)."</a>
		<a href=\"#\" id=\"join-group\" class=\"icon\">".sprite('show-less',true)." Zobraziť menej</a>
	</li>";
}

for($i=0; $i<$bars; $i++) { $_bars.="<div style=\"width:".(100/$bars)."%;\"></div>"; }

$current	= date('Y');
$year_prev	= $year - 1 >= $data_years[0] ? "<a href=\"{$root}profile?q=$q&year=".($year - 1)."#years\" class=\"icon\">".sprite('year-prev',true).($year - 1)."</a>" : '';
$year_next	= $year + 1 < $current ? "<a href=\"{$root}profile?q=$q&year=".($year + 1)."#years\" class=\"icon\">".($year + 1).sprite('year-next',true)."</a>" : '';
?>


<div id="overlay">
	<div>
		<b>Toto je stránka výsledkov.</b><br/><br/>Ahoj, si tu prvýkrát, ideme ti vysvetliť, ako to tu funguje.
		<a href="#" class="button">Začať prehliadku</a>
	</div>
</div>


<ul class="services mobile">
	<li><a href="#">Podrobné dáta nájdete vo full verzii stránky</a></li>
</ul>

<!-- S TENDRAMI -->

<section id="main" class="block profile tour focus">
	<form id="search" class="small desktop" action="" method="POST">
		<a href="<?php echo "{$root}results?q=$q"; ?>" class="icon"><?php sprite('back'); ?> Späť</a>
		<input type="text" name="query" value="<?php echo $q; ?>"/>
		<input type="submit" name="submit" value="Hľadať"/>
	</form>
	<div id="name">
		<h2><b><?php echo $q; ?></b></h2><?php help('Help #1','Class aptent taciti sociosqu ad litora torquent per conubia nostra. <a href=\"#\">Viac...</a>'); ?>
		<div>Strmý Vŕšok 8137/137<br/>84106 Bratislava-Záhorská Bystrica</div>
	</div>
	<div id="sum">
		<h2>1 004 037 141,66 €</h2><br/>
		<b>Hodnota štátnych tendrov</b> za roky 2005 – 2013
		<?php help('Help #2','Class aptent taciti sociosqu ad litora torquent per conubia nostra. <a href=\"#\">Viac...</a>'); ?>
	</div>
	<a href="#" id="share" class="icon desktop addthis_button_compact">Zdieľať <?php sprite('share'); ?></a>
</section>

<div id="data">

	<section class="active">
		<h3 class="desktop"><a href="#">Hodnota štátnych tendrov pre nájdené firmy <i>2005 – 2013</i></a></h3>
		<div>
			<!-- <div id="pie">
				<?php help('Help #3','Class aptent taciti sociosqu ad litora torquent per conubia nostra. <a href=\"#\">Viac...</a>'); ?>
				<ul class="list">
					<?php echo $labels; echo $grouper; ?>
				</ul>
				<div id="stripe" class="block">
					<div>
						<div id="parts"><?php echo $parts; ?></div>
						<div id="bars"><?php echo $_bars; ?></div>
					</div>
					<div class="label">0 €</div>
					<div class="label" id="total"></div>
				</div>
			</div> -->
			<div id="pie"></div>
			<div id="graph" class="znd-graph"> <!-- block desktop -->
				<h3 class="bar-title">Celkový objem tendrov</h3>
				<div class="bar"></div>
				<h3 class="timeline-title">Účinkovanie osoby vo firmách v jednotlivých rokoch</h3>
				<div class="navigable">
					<div class="area"></div>
					<div class="timeline">
						<div class="d3-tip d3-tip-custom n"></div>
					</div>
				</div>
			</div>
		</div>
		<a href="#" class="icon download desktop"><?php sprite('download'); ?> Stiahnuť kompletné dáta <i>CSV</i></a>
	</section>

	<section class="desktop">
		<h3><a href="#">Ktoré verejné inštitúcie tendre organizovali?</a></h3>
		<div><?php generateTable($companies_head,$companies_data,false); ?></div>
	</section>

	<section class="desktop">
		<h3><a href="#">Zoznam tendrov</a></h3>
		<div>
			<?php
			foreach($tenders_data as $company => $data) {
				$c = explode(';',$company);
				echo "<h4><a href=\"#\" class=\"icon\"><b>$c[0]</b>   $c[1]   IČO <b>$c[2]</b> ".sprite('external',true)."</a></h4>";
				generateTable($tenders_head,$data);
			}
			?>
		</div>
	</section>

	<section class="desktop">
		<h3><a href="#">Firmy bez štátnych tendrov</a></h3>
		<div><?php generateTable($companies_head,$companies_data); ?></div>
	</section>

	<!-- <section class="mobile active">
		<div id="years" class="block"><?php echo "<div class=\"block\">$year_prev</div><h3>$year<br/><i>".comma($year_total)." €</i></h3><div class=\"block\">$year_next</div>" ?></div>
		<ul id="mobile"><?php echo $mobile; ?></ul>
		<div class="block">* Pôsobenie na danej pozícii bolo v minulosti dočasne prerušené.</div>
	</section> -->

</div>

<!-- BEZ TENDROV -->

<div id="graph_" class="x">Ak sa firmy danej osoby nezúčastnili žiadnych tendrov:</div>

<section id="main" class="block profile">
	<form id="search" class="small desktop" action="" method="POST">
		<a href="<?php echo "{$root}results?q=$q"; ?>" class="icon"><?php sprite('back'); ?> Späť</a>
		<input type="text" name="query" value="<?php echo $q; ?>"/>
		<input type="submit" name="submit" value="Hľadať"/>
	</form>
	<div id="name">
		<h2><b><?php echo $q; ?></b></h2>
		<div>Strmý Vŕšok 8137/137<br/>84106 Bratislava-Záhorská Bystrica</div>
	</div>
	<div id="sum">
		<h2>0 €</h2><br/>
		<b>Hodnota štátnych tendrov</b> za roky 2005 – 2013
	</div>
	<p><b>Firmy súvisiace s hľadanou osobou nevyhrali v minulosti žiadne štátne tendre.</b></p>
	<p class="disclaimer">Hľadaná osoba mohla v nájdených firmách v minulosti pôsobiť iba krátkodobo - vo vlastníckej alebo riadiacej pozícii alebo v niektorom z orgánov spoločnosti. Podrobnosti o firmách nájdete po odkliku z názvu firmy na Firemny-Register.sk. Overte si, čím sa firma zaoberá a kedy hľadaná osoba vo firme pôsobila.</p>
	<a href="#" id="share" class="icon desktop addthis_button_compact">Zdieľať <?php sprite('share'); ?></a>
</section>

<div id="data">
	<section class="active">
		<h3><a href="#">Firmy bez štátnych tendrov</a></h3>
		<div><?php generateTable($companies_head,$companies_data); ?></div>
	</section>
</div>

<!-- graph templates -->

<script type="text/template" class="template" id="tpl-controls">
		<ul class="list">
		<% _.each(model, function(item) {%>
			<li data-series="<%= item.seriesName %>" class="company active"><!-- active hidden group -->
				<label style="color: white;">
					<input type="checkbox">
					<b style="color: <%= item.color %>">
						<svg version="1.0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="12px" height="12px" viewBox="0 0 12 12" enable-background="new 0 0 12 12" xml:space="preserve">
							<circle cx="6" cy="6" r="6" fill="<%= item.color %>"></circle>
						</svg>
						<%= item.seriesName %>
						<i><%= item.aggregatedCount %></i>
						<br/><%= item.percentage %>%
					</b>
					<%= item.sum %>
				</label>
			</li>
		<% }); %>
		<li class="desktop">
			<a href="#" id="break-group" class="icon">
				Zobraziť všetky
				<svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="system/svg/sprite.svg#show-more"></use></svg>
			</a>
			<a href="#" id="join-group" class="icon">
				<svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="system/svg/sprite.svg#show-less"></use></svg>
				Zobraziť menej
			</a>
		</li>
	</ul>
</script>

<script type="text/template" class="template" id="tpl-navig-desktop">
	<div class="navigation" id="navig-desktop">
			<div class="pan back"><span><svg>
					<use width="60%" height="60%" x="10" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="system/svg/sprite.svg#year-prev"></use>
				</svg></span></div>
			<div class="pan forward"><span><svg >
					<use width="60%" height="60%" x="5" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="system/svg/sprite.svg#year-next"></use>
				</svg></span></div>
	</div>
</script>


<script type="text/template" class="template" id="tpl-navig-mobile">
	<div class="navigation" id="navig-mobile">
	<div id="years" class="block">
		<div class="block back">
			<% if (prevYear) { %><a class="icon">
				<svg>
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="system/svg/sprite.svg#year-prev"></use>
				</svg><%= prevYear %>
			</a><% } %>
		</div>
		<h3><%= currentYear %> <br/> <i><%= currentTotal %></i></></h3>

		<div class="block forward">
			 <% if (nextYear) { %><a class="icon"><%= nextYear %>
				<svg>
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="system/svg/sprite.svg#year-next">
					</use>
				</svg>
			</a><% } %>
		</div>
	</div>
	</div>
</script>

<script type="text/template" class="template" id="tpl-tooltip">
	<ul>
		<% _.each(model, function(itemData) {%>
		<li>
			<span class="bullet" style="color: <%= itemData.color %>"><span>&#8226;</span></span>
			<em class="company"><%= itemData.company %></em>
			<span class="amount"><%= itemData.amount %></span>
		</li>
		<% }); %>
	</ul>
</script>

<!-- graph impl  -->
<script type="text/javascript" src="system/znd-graph.min.js"></script>
<script type="text/javascript" src="system/znd-graph-testdata.js"></script>
<script type="text/javascript" src="system/znd-graph-init.js"></script>
