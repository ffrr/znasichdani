<?php

$months = array(
'01' => 'január',
'02' => 'február',
'03' => 'marec',
'04' => 'apríl',
'05' => 'máj',
'06' => 'jún',
'07' => 'júl',
'08' => 'august',
'09' => 'september',
'10' => 'október',
'11' => 'november',
'12' => 'december',
);


$data_years			= array(2010,2011,2012,2013,2014);


$data_colors		= array('00d4ff','ff94d6','ffc100','00c16a','adabff','e6ff00','ff54d6','0080ff','ff8600','00add3','ff4e00','00d030','b97fff','00ffb9','c53651');


$top_people = array(
'Ivan Kmotrík',
'Vladimír Poór',
'Juraj Široký',
'Vladimír Poór',
'Juraj Široký',
'Ivan Kmotrík',
'Vladimír Poór',
'Juraj Široký',
);


$results = array(
array(
	'Strmý Vŕšok 8137/137, 84106 Bratislava-Záhorská Bystrica',
	'1004037141',
	'CHEMOLAK a.s.;Plastika, a.s.;VÁHOSTAV - SK, a.s.;Rajo, a.s.',
	'CHEMOLAK a.s.;Plastika, a.s.;VÁHOSTAV - SK, a.s.;CHEMOLAK a.s.;Plastika, a.s.;VÁHOSTAV - SK, a.s.;CHEMOLAK a.s.;Plastika, a.s.;VÁHOSTAV - SK, a.s.',
),
array(
	'Strmý Vŕšok 8137/137, 84106 Bratislava',
	'864428342',
	'CHEMOLAK a.s.;Plastika, a.s.;VÁHOSTAV - SK, a.s.',
	'CHEMOLAK a.s.;Plastika, a.s.',
),
array(
	'Strmý Vŕšok 8137/137, 84106 Bratislava-Záhorská Bystrica',
	'0',
	'',
	'CHEMOLAK a.s.;Plastika, a.s.;VÁHOSTAV - SK, a.s.;CHEMOLAK a.s.;Plastika, a.s.;VÁHOSTAV - SK, a.s.;CHEMOLAK a.s.;Plastika, a.s.;VÁHOSTAV - SK, a.s.',
),
array(
	'Strmý Vŕšok 8137/137, 84106 Bratislava-Záhorská Bystrica',
	'0',
	'',
	'CHEMOLAK a.s.;Plastika, a.s.;VÁHOSTAV - SK, a.s.;CHEMOLAK a.s.;Plastika, a.s.;VÁHOSTAV - SK, a.s.',
),
array(
	'Strmý Vŕšok 8137/137, 84106 Bratislava-Záhorská Bystrica',
	'0',
	'',
	'CHEMOLAK a.s.;Plastika, a.s.;VÁHOSTAV - SK, a.s.;CHEMOLAK a.s.;Plastika, a.s.;VÁHOSTAV - SK, a.s.;CHEMOLAK a.s.',
),
);


$tenders_head = array('Tender','Obstarávateľ','Suma zákazky','Názov zákazky');
$tenders_data = array(
'Chemolak a. s.;Továrenská 7, 919 04 Smolenice;31411851' => array(
	'05983-VST 246/2008		Slovenská elektrizačná prenosová sústava, a.s.				60 000 000.00 SKK		Náterové hmoty na náter oceľových konštrukcií',
	'00317-VZT 10/2009		Národná diaľničná spoločnosť, a.s.							3 740.00 EUR			Nákup farieb pre náterové systémy',
	'02075-VZT 73/2009		Národná diaľničná spoločnosť, a.s.							2 303.00 EUR			Nákup farieb pre náterové systémy',
	),
'Plastika, a. s.;Novozámocká 222, 949 05 Nitra 5;00152781' => array(
	'05983-VST 246/2008		Slovenská elektrizačná prenosová sústava, a.s.				60 000 000.00 SKK		Náterové hmoty na náter oceľových konštrukcií',
	'00317-VZT 10/2009		Národná diaľničná spoločnosť, a.s.							3 740.00 EUR			Nákup farieb pre náterové systémy',
	),
);


$companies_head = array('Firma','Adresa','IČO');
$companies_data = array(
'Národná diaľničná spoločnosť, a. s.	Jána Smreka 14, 841 08 Bratislava				46483012',
'Plastika, a. s.						Kpt. Nálepku 126/7, 346 09 Trenčín				53463658',
'Chemolak, s. r. o.						SNP 2, 241 45 Žilina							34924352',
);


$data_graph			= array(
	'Chemolak, a. s.'	=> array(
		array(10,8,6,9,7),
		array(
			'Štatutár' => '2010-01-01:2014-01-31|2014-07-01:',
			'Konateľ' => '2010-01-01:2014-07-01',
		),
	),
	'Plastika, a. s.'	=> array(
		array(1,7,1,4,3),
		array(
			'Štatutár' => '2010-01-01:',
			'Konateľ' => '2011-01-01:',
		),
	),
	'VÁHOSTAV, a. s.'	=> array(
		array(4,8,2,1,0),
		array(
			'Konateľ' => '2010-01-01:2011-02-15|2011-07-01:2013-12-31',
		),
	),
	'SEZ, a. s.'	=> array(
		array(2,2,1,0,1),
		array(
			'Štatutár' => '2012-07-01:2014-12-31',
		),
	),
	'Doprastav, a. s.'	=> array(
		array(1,0,1,2,0),
		array(
			'Štatutár' => '2010-07-01:',
		),
	),
	'Škridplech, a. s.'	=> array(
		array(1,0,1,1,0),
		array(
			'Štatutár' => '2010-07-01:',
		),
	),
);

?>