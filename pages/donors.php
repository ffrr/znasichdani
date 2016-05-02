<section id="logos">
	<div class="block">
		<?php
		foreach($donors as $section => $list) {
			echo "<h3>$section</h3>";
			foreach($list as $i) {
				$i = explode("\t",preg_replace("/\t+/","\t",$i));
				$_list.="<li><a href=\"$i[2]\" target=\"_blank\"><img src=\"content/logo-$i[0].png\" alt=\"$i[1]\"></a></li>";
			}
			echo "<ul class=\"logos\">$_list</ul>";
			unset($_list);
		}
		?>
	</div>
</section>