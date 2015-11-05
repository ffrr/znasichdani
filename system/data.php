<?php

$menu = array(
'about'			=> 'O projekte',
'faq'			=> 'FAQ',
'donors'		=> 'Donori',
'support'		=> 'Podporte tento projekt',
);
if($var1 == 'profile') { $menu['help']= 'Potrebujete pomoc?'; }


$services = array(
'facebook	#06b	Aliancia Fair-play na Facebooku		https://www.facebook.com/alianciafairplay',
'twitter	#0af	Aliancia Fair-play na Twitteri		http://www.twitter.com/alianciaFP',
'email		#f50	Novinky e-mailom					'.$root.'newsletter',
);


$projects = array(
'Datanest				projekt-datanest.png			Zbierame informácie o štátnych zákazkach, dotáciách, peniazoch v politike. Zistite podrobnosti o verejných financiách na Slovensku.',
'Otvorené Zmluvy		projekt-otvorene_zmluvy.png		Pomáhame občanom vyhľadávať, čítať a posudzovať výhodnosť štátom uzavretých zmlúv.',
'Politika Open			projekt-politikaopen.png		Priestor, kde sa pred verejnosťou odkrývajú dôležité aspekty života a činnosti politika. Odhaľuje jeho majetok, záväzky a väzby.',
'Pozemky.fair-play.sk	project-pozemky.png				Zverejňujeme zmluvy podpísané Slovenským pozemkovým fondom, ktoré inde nevyhľadáte.',
'Firemný Register		projekt-firemnyregister.png		Interaktívne zobrazenie informácií a vzťahov z Obchodného registra SR a ďalších zdrojov.',
);


$about = array(

array('Na čo slúži ZnašichDaní.sk?', 'about',
'ZNašichDaní ukazuje, firmy ktorých podnikateľov získavajú najväčšie zákazky od štátu.

Vďaka Vestníku verejného obstarávania dokážeme sledovať toky verejných peňazí od štátu k firmám. Väčší problém je vystopovať financie až ku konkrétnym osobám, ktoré stoja za týmito spoločnosťami. Pokusy odhaliť ich boli dlho veľmi pracné aj pre skúsených investigatívnych novinárov.

ZNašichDaní.sk vychádza z predpokladu, že ak budú občania  vedieť, kto sú vplyvní manažéri a podnikatelia, hospodárenie s verejnými peniazmi na Slovensku sa stane otvorenejším. Informácie o predražených tovaroch a službách kupovaných štátom dostávajú nový rozmer, ak si k nim občania vedia priradiť konkrétne mená.

Autorom konceptu tohto projektu je Peter Kunder. Jeho realizácia vznikla v roku 2011 ako výsledok spolupráce Aliancie Fair-play a projektu Firemný register.'
),

array('Právne informácie', 'legal',
'Údaje na tejto stránke sú iba informatívne. Výpisy nie sú použiteľné na právne účely. Autori neručia za aktuálnosť, bezpečnosť a bezchybnosť informácií a nenesú zodpovednosť za chybné alebo chýbajúce informácie na tejto stránke. V plnom zákonnom rozsahu sa vzdávajú všetkých záruk, výslovných alebo predpokladaných, vo vzťahu k presnosti informácií obsiahnutých v ktorejkoľvek časti tejto webovej stránky.

Použité dáta pochádzajú zo stránok <a href="http://datanest.fair-play.sk/pages/index">Datanest Aliancie Fair-play</a>, <a href="http://www.orsr.sk/">Obchodného registra SR</a>, <a href="https://www2.uvo.gov.sk/evestnik">Vestníka verejného obstarávania</a> a sú prepájané pomocou algoritmov projektu <a href="http://firemny-register.sk/">Firemný register</a>.

Autori negarantujú neustálu dostupnosť ZNašichDaní.sk. Nenesú zodpovednosť za straty či škody spôsobené nedostupnosťou alebo prerušením dostupnosti webovej stránky.

Autori si vyhradzujú právo na zmenu ktorejkoľvek časti webovej stránky.

Programové súčasti tohto projektu, ktoré sú dielom autorov projektu, nie je možné modifikovať a distribuovať bez predošlého súhlasu autorov.'
),

array('Súkromie a cookies', 'privacy',
'Cookie je krátky textový súbor, ktorý do prehliadača odosielajú navštívené webové stránky. Webovým stránkam umožňuje zapamätať si informácie o vašej návšteve, napríklad preferovaný jazyk a ďalšie nastavenia.

Cookies nám pomáhajú vo vyhodnocovaní zmysluplnosti našich webových stránok prostredníctvom Google Analytics. Ide o analytický nástroj, ktorý pomáha vlastníkom webových stránok a aplikácií pochopiť, ako ich návštevníci tieto weby používajú. Informácie, ktoré takto zhromažďujeme, sú štatistického charakteru, bez osobnej identifikácie jednotlivých návštevníkov

Používaním ZNašichDaní.sk súhlasíte so zberom anonymných štatistík používania aplikácie. Tieto štatistiky sú využívané výhradne na zlepšenie vlastností aplikácie.'
)
);


$faq = array(

array('Vyhľadávanie', 'searching', array(
'Ako môžem vyhľadať verejné obstarávanie konkrétnej osoby?' => 'Zadajte meno, ktoré hľadáte. Zobrazí sa vám zoznam mien nájdených v obchodnom registri. Na základe doplňujúcich informácií (adresa, zoznam firiem) vyberte konkrétnu osobu. Následne sa vám zobrazí hodnota všetkých zákaziek spojených s danou osobou a podrobný prehľad všetkých subjektov, kde vystupuje alebo vystupovala hľadaná osoba.

ZNašichDaní.sk započítava všetky zákazky, ktoré firmy spojené s hľadanou osobou (s konkrétnym menom, na konkrétnej adrese) získali podľa Vestníka verejného obstarávania od roku 2005.',

'Vo výsledkoch vyhľadávania vidím viac osôb s rovnakým menom. Ako identifikujem tú, ktorú hľadám?' => 'Vyhľadávanie na ZNašichDaní nájde všetky osoby so zadaným menom, nie vždy však musí ísť o tú istú osobu. V niektorých prípadoch môže ísť len o menovcov, v iných môže byť zas rovnaká osoba uvedená vo výsledkoch vyhľadávania viackrát. Osobu, ktorú hľadáte, dokážete bližšie určiť podľa adresy trvalého bydliska a spoločností, v ktorých figuruje.

Dôvodom, prečo na menovcov nedokážeme upozorniť, je, že databáza osôb a firiem, ktorú preberáme z Obchodného registra SR,  neposkytuje unikátne identifikátory osôb - konkrétne osoby teda nedokážeme so stopercentnou istotou určiť ani my. (Prečo? <a href="'.$root.'faq/processing">Prečítajte si, ako pracujeme s dátami.</a>)',
)),

array('Koho nájdete na ZnašichDaní', 'results', array(

'Aké osoby je možné vyhľadať?' => 'Vyhľadávať je možné osoby, ktoré vystupujú v akomkoľvek subjekte, ktorý je vedený v Obchodnom registri SR. Pre obchodné spoločnosti je to napríklad spoločník, štatutár, konateľ, člen dozornej rady atď.',

'Prečo nemôžem nájsť osobu, o ktorej som presvedčený, že podniká?' => 'Pre vyhľadávania osôb sa využívajú údaje z on-line výpisov obchodného registra. Hľadanú osobu nájdete iba v prípade, ak sa nachádza v týchto výpisoch. Ak osobu nemôžete nájsť, znamená to, že nie je vedená v obchodnom registri alebo je vo výpisoch uvedená neštandardným spôsobom.

Údaje vo výpisoch obchodného registra na internete sa aktualizujú približne každé dva týždne. Môže nastať prípad, že nie je možné nájsť osobu, ktorá bolo zapísaná v obchodnom registri počas posledných dvoch týždňov a táto osoba sa ešte nenachádza v internetových výpisoch.',

'Prečo nemôžem nájsť osobu podľa jej priezviska?' => 'Príležitostne sa stáva, že priezvisko osoby je zapísané v databáze obchodného registra neštandardným spôsobom, napríklad s písmenami oddelenými medzerami. Aby aplikácia takéto priezvisko našla, musí byť pri vyhľadávaní zadané identicky, ako je uvedené v databáze obchodného registra.',
)),

array('Aké dáta používame?', 'data', array(

'Odkiaľ pochádzajú informácie, s ktorými ZNašichDaní.sk pracuje?' => 'Dáta čerpáme z Obchodného registra SR a Vestníka verejného obstarávania. Informácie o verejných obstarávaniach z vestníka zbierame na službe Datanest.sk Aliancie Fair-play, odkiaľ ich čerpá ZNašichDaní.sk. Dáta z ORSR získavame a následne prepájame s dátami o obstarávaniach pomocou algoritmov projektu Firemny-register.sk.',

'S akými dátami o verejnom obstarávaní ZNašichDaní.sk pracuje?' => 'Vyhľadávanie prebieha  iba v štátnych tendroch uverejnených vo Vestníku verejného obstarávania od roku 2005, staršie údaje nemáme k dispozícii.

Pracujeme iba s hodnotami zákaziek, nie s objemom reálne vyplatených peňazí či ziskom spoločností. Nejde o synonymá a tieto čiastky sa môžu výrazne odlišovať.',
)),

array('Ako interpretovať výsledky', 'understanding_results', array(

'Znamená zobrazená suma zisk konkrétnej osoby?' => 'Rozhodne nie. Suma, ktorú ZNašichDaní spočíta, hovorí iba o tom, aké veľké obchody získali od štátu firmy spojené s konkrétnym človekom. Toto číslo nevypovedá o zárobkoch konkrétnych osôb, keďže každá firma má odmeny nastavené individuálne v závislosti od pozície a podielu jednotlivých osôb.

Dôležité je tiež uvedomiť si, že hodnota získaných tendrov sa nerozpočítava medzi jednotlivé osoby evidované vo firme, ale  viaže sa na celú spoločnosť. Rovnaké číslo sa zobrazí pri každej osobe, ktorá vo firme pôsobí - bez ohľadu na výšku podielu či skutočnosť, že tento človek nemá žiadny podiel.',

'Môže sa stať, že vyhľadané verejné obstarávania nezodpovedajú skutočnosti?' => 'Do výsledkov sa započítavajú iba výsledky verejných súťaží a  ZNašichDaní z nich neodrátava možné zrušené či nenaplnené kontrakty. Nie je preto vhodné uvádzané hodnoty stotožňovať s hodnotou reálne vyplatených/prijatých peňazí.

Môže sa stať, že niektoré zákazky sa na ZNašichDaní pri konkrétnej osobe nezobrazujú. Stáva sa to v prípade, keď Vestník verejného obstarávania neuvádza alebo nesprávne uvádza IČO spoločnosti, ktorá získala zákazku - v takomto prípade dáta nevieme správne priradiť.

Nedá sa vylúčiť, že do výslednej sumy zákazky mohla byť v niektorých prípadoch zaradená cena rámcovej zmluvy, ako aj ceny zmlúv zabezpečujúcich čiastkové plnenie tejto rámcovej zmluvy. V takýchto prípadoch môže prísť k duplicitnému napočítaniu celkovej hodnoty obstarávaní pre danú osobu.

Môže tiež nastať dočasný výpadok dostupnosti dát z vestníka v prípade, že Úrad pre verejné obstarávanie zmení štruktúru vestníka.

Aby ste sa vyhli možným chybám v interpretácii dát, odporúčame vždy si pozorne pozrieť aj konkrétne detaily obstarávaní, na ktoré odkazujeme pri každej osobe.

Presnejší obraz o celkových vyplatených sumách môžete získať, ak dáta o verejných obstarávaniach porovnáte s dátami v štátnych zmluvách, ktoré nájdete napríklad na OtvoreneZmluvy.sk.

<b><i>Pred vyvodením akýchkoľvek záverov je preto potrebné si všetky údaje overiť v Obchodnom registri a vo Vestníku verejného obstarávania!</i></b>',

'Prečo vo výslednom grafe ku každej osobe upozorňujete na to, na akej pozícii daný človek vo svojich firmách pôsobi(l)?' => 'Dôležité je uvedomiť si, že ZNašichDaní nevyhľadáva iba podnikateľov, ale aj členov predstavenstiev, dozorných rád alebo manažmentu, ktorí nemusia byť vlastníkmi, ale iba zamestnancami spoločností. Pozor, je rozdiel v tom, aký vplyv na chod firmy majú osoby na rôznych pozíciách! Všetky tieto osoby však môžu, no nemusia mať priamy súvis so získanými zákazkami.',

'Je dôležité všímať si dátumy získaných tendrov?' => 'Určite, zobrazujeme totiž tendre firiem za celé obdobie od roku 2005 až po súčasnosť. Môže sa stať, že v období získania zákazky už hľadaná osoba nemusela vo firme pôsobiť - a teda je nižšia pravdepodobnosť, že mohla maž na získanie obchodu vplyv. Na stránke s výslednými sumami obstarávaní si v grafoch vždy skontrolujte, či vami hľadaná osoba vo firme v čase získania zákazky pôsobila.',

'Je do údajov o verejných obstarávaniach započítaná DPH?' => 'Uvádzané hodnoty zákaziek sú očistené od DPH. Niektoré hodnoty vznikli automatickým prepočítaním cien s DPH a môže pri nich prísť k drobným odchýlkam.',

'Môžem si zobraziť prehľad verejných obstarávaní pre viac osôb naraz?' => 'Nie je možné zobraziť si výsledky pre viac než jednu osobu naraz. Používateľom, ktorí majú záujem preskúmať viac osôb, ponúkame možnosť stiahnuť si .CSV s podrobným prehľadom verejných obstarávaní ku každej hľadanej osobe a zanalyzovať dáta na svojom počítači.',
)),

array('Ako sú dáta pred zverejnením upravované?', 'processing', array(

'' => 'Dáta o osobách po ich získaní z Obchodného registra ďalej upravujeme. Zo skúsenosti vieme, že totožné osoby bývajú v ORSR často uvedené rôznymi spôsobmi s drobnými odchýlkami - napríklad v prípade, ak dôjde k preklepu v čísle domu. Problém je tiež v prípade menovcov - napríklad otca a syna bývajúcich na tej istej adrese - ktorých je možné pri nesprávnej interpretácii na prvý pohľad zameniť.

Takéto chyby a nejasnosti sú v zdrojových dátach časté. Obchodný register nepoužíva pre osoby unikátne identifikátory a celkom predísť nesprávnemu spájaniu alebo duplikovaniu osôb preto nie je možné. Bez aspoň čiastočného vyčistenia dát sme však nedokázali efektívne párovať konkrétne osoby na získané zákazky.

Túto nekvalitu dát sa snažíme riešiť aspoň čiastočnou štandardizáciou.

Používateľov, ktorí sa chystajú s dátami analyticky pracovať, prosíme, aby si starostlivo preštudovali popis špecifík dát a úprav, ktoré nad nimi robíme.

1. Za unikátny identifikátor osoby na ZNašichDaní.sk považujeme <b>meno, priezvisko, tituly, adresu a firmy, v ktorých osoba figuruje</b>. Pri viacerých menovcoch dokážeme iba podľa týchto znakov určiť, o koho konkrétne ide.

2. <b>Osoby s rovnakým menom vedené na rôznych adresách nespájame</b> - ani keby sme zaručene vedeli, že ide o rovnakého človeka, ktorý sa počas svojej kariéry presťahoval.

3. <b>Nespájame ani menovcov s rôznymi akademickými titulmi.</b>

4. Nechávame na používateľoch, aby takýchto jednotlivcov pospájali podľa svojich vedomostí vo vlastných analýzach.

5. Nevieme zabrániť duplikovaniu totožných osôb s neštandardne uvedenými menami alebo adresami - napríklad v prípade, že dôjde v ORSR k preklepu. Často sa vyskytujú aj rôzne vedené trvalé bydliská, napríklad Hodžovo námestie 12 a Hodžovo nám. 12 - takéto prípady spojiť nedokážeme.

6. Na spájanie osôb používame nasledovný postup:

- Mená, priezviská a adresy prevedieme na malé písmená, odstránime diakritiku. Z adries odstránime aj znaky: „,./-“ a slová ako “okres”, “okr.”, “PSČ” a pod.
- Podmienka 1: osoba1.meno = osoba2.meno
- Podmienka 2: osoba1.priezvisko = osoba2.priezvisko
- Podmienka 3: osoba1.titulPredMenom = osoba2.titulPredMenom
- Podmienka 4: osoba1.titulZaMenom = osoba2.titulZaMenom
- Podmienka 5: existuje osoba1.adresa aj osoba2.adresa
- Podmienka 6: osoba1.adresa [je súčasťou] osoba2.adresa OR osoba2.adresa [je súčasťou] osoba1.adresa

Dve osoby označíme za totožné iba vtedy, ak je po úvodných úpravách splnených všetkých šesť podmienok: ak sa zhoduje meno, priezvisko, titul pred menom a titul za menom oboch osôb, a ak majú obidve osoby vyplnenú adresu. Tie sa navyše musia zhodovať. 

Za zhodné označíme adresy iba vtedy, ak je možné povedať, že jedna z adries je podmnožinou druhej:

- Z oboch reťazcov adries odstránime slová, ktoré sa nachádzajú v oboch adresách
- Ak následne zostane jedna adresa prázdna (je "podmnožinou" druhej adresy), považujeme adresy za zhodné'
)),
);


$notes = array(
'Prečo vidím to isté meno viackrát?' => 'Na Slovensku môže žiť viac ľudí s tým istým menom (menovci, rodinní príslušníci). Často sa tiež stáva, že jedna osoba je v Obchodnom registri SR, z ktorého čerpáme dáta, uvedená viackrát.

Obchodný register tieto prípady nevie ošetriť tak, aby pre každého jednotlivca existoval iba jediný presne identifikovateľný záznam. Je preto potrebné, aby ste osobu, ktorú hľadáte, identifikovali sami. Vyberte si jedno meno, ktoré sa podľa vás určite viaže na hľadanú osobu. Rozhodnúť sa vám pomôžu adresy trvalého bydliska pod menom, alebo firmy, v ktorých osoby pôsobili.',

'Musím si vybrať iba jednu osobu?' => 'Áno, my za vás potom spojíme túto osobu so všetkými firmami na Slovensku, ktoré sa viažu na dané meno a adresu. Na ďalšej obrazovke vám ukážeme, aké úspešné boli tieto firmy v štátnych tendroch.',

'Čo mám robiť, ak viem, že mnou hľadaná osoba sa v zozname nachádza viackrát?' => 'Môžete si zobraziť výsledky pre každú možnosť zvlášť, alebo si môžete stiahnuť údaje pre jednotlivé osoby kliknutím na ikonu Stiahnuť kompletné dáta - CSV (súbor otvoríte napríklad v Exceli). Tieto údaje môžete potom ďalej analyzovať a spájať podľa potreby. Ak sa pustíte touto cestou - pozor! Prečítajte si <a href="'.$root.'faq/processing">metodológiu, ktorou spracovávame dáta pred zverejnením</a>, aby ste sa vyhli chybám.',
);

?>