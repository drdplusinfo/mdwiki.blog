# Technický milník - zrychlili jsme

7.3. 2018

*15 minut čtení*

## Pomalý rozjezd

*Na začátku to upcávalo dráty, na konci to bude jako offline aplikace v telefonu.*

Jak už jsem [psal v dopise Altaru](./2017-08-02-ptam_se_bouchiho_z_altaru_zda_mohu_zverejnit_drd_pravidla.md), začátky stránek [drdplus.info](https://www.drdplus.info) byly tristní. [PPH](https://pph.drdplus.info) se načítaly tak dlouho, že jsem si rychleji našel [původní PDFko](https://obchod.altar.cz/drd-prirucka-pro-hrace-everze-p-972.html?buy=Koup%C3%ADm+DrD%2B+PPH+%28Pravidla+pro+hr%C3%A1%C4%8De%29) a v něm se dočetl co jsem hledal.
No, trochu mě to otrávilo, takže jsem se na pravidla na webu taky na čas vykvajznul.

### Osud si tě najde

Malá revoluce pro mě nastala objevením [webového serveru Caddy](https://caddyserver.com/), kterému jsem [nepříliš složitým textovým souborem](https://caddyserver.com/tutorial/caddyfile) oznámil, co má zobrazovat, a najednou jsem měl stránky na [HTTPS](https://www.vzhurudolu.cz/prirucka/https) a ještě k tomu se načítaly o poznání rychleji, jelikož využívaly [HTTP/2](https://www.vzhurudolu.cz/prirucka/http-2), což je, krom jiného, paralerní stahování částí stránky (třeba taková Pravidla pro hráče jsou složena z padesáti devíti částí a stahovat je po jedné, nebo všechny najednou, to už je rozdíl).
Navíc už má [Caddy](https://caddyserver.com/) spoustu rozšíření a například [jeden z nich](https://caddyserver.com/docs/http.git) čeká na políček z internetu, že by si měl stáhnout nové změny, takže když v 16:01:15 pošlu na server s kódem změnu (ten server je jiný, než ze kterého běží [drdplus.info](https://www.drdplus.info)), tak  v 16:01:25 už je změna veřejná a ty ji uvidíš. To hodně pomáhá psychicky, protože pak nemám blok nasazovat změny hned, kdybych musel ještě "mačkat tohleto a potvrzovat támhleto".

### Pozitivní lenost

Jo, pravdou je, že kdybych se snažil, tak to samé získám s běžným [Apache web serverem](https://httpd.apache.org/) a nemusel bych se se systémem prát, který z těch dvou webových serverů bude mít exkluzivní právo na port 443 (což nakonec vyústilo ke smazání Apache, což popravdě taky nebylo úplně samozřejmé, jelikož ta potvora se drží zuby nehty).
Jenže s [Caddy](https://caddyserver.com/) jsem to měl hned a bez práce (teď už [Apache podporuje HTTP/2](https://httpd.apache.org/docs/2.4/mod/mod_http2.html) a získání certifikátu pro HTTPS zadarmo od [Let's Encrypt](https://letsencrypt.org/) je [taky hračka](https://www.root.cz/clanky/apache-pridava-podporu-let-s-encrypt-pro-https-staci-jeden-radek-konfigurace/), ale před dvěma lety nebylo).

## Cachujeme

Cache je dočasná paměť (někdy jí říkají taky mezipaměť), která předhodí už známý výsledek, aby se to nepočítalo / nelepilo / nestahovalo znova. A ta má jednu dost ošklivou vlastnost, ať už jde o mezipaměť v hlavě strážníka, který si nepřečetl novou vyhlášku, nebo chaotická změť bajtů někde v počítači.
Těžko se hledá ten správný okamžik, kdy se to má všechno zahodit a načíst zase znova.

### Slepá kolej
Já to asi před rokem zkoušel s tehdy ještě pořád populární, přestože už označenou jako *zastaralou*, [aplikační keší](https://developer.mozilla.org/en-US/docs/Web/HTML/Using_the_application_cache), což je technologie prohlížečů, která umožňuje **celou** stránku uložit pěkně na straně návštěvníka a kdykoli se návštěvník chce na stránku podívat, použije se ta předuložená stránka a je to pak bleskurychlé.
A taky je to peklo tu keš zahodit, když se něco v obsahu změní... proto je už delší dobu označená jako *zastaralá*, jelikož si na tom rozbilo hubu příliš mnoho lidí, včetně mě.

Jelikož jsem si na tom spálil prsty a vyhodil několik desítek hodin práce, tak jsem celou slavnou *aplikační keš* zahodil.
Ale zas jsem se něco přiučil a hlavně jsem při tom zdokonalil kešování na straně serveru (to je ta magická krabička někde na druhé straně drátů, která ti to všechno pošle).

### Kešování na serveru
Možná máš pocit, že někde v internetu čeká jedna hotová stránka, která tě dychtivě vyhlíží v očekávání, kdy jí konečně najdeš a zobrazíš. Obvykle to tak skutečně je, ale tu celou stránku nedávají dohromady lidé. My vytváříme kousky a necháváme je lepit dohromady, protože jinak bychom se z toho zcvokli.
Důvody jsou dva:

- většina stránek má něco společného, vzhled, pravidla zobrazení na mobilu, podmíky kešování na straně návštěvníka
  - no kdo by se s tímhle psal dvakrát, neřku-li jedenáctkrát jako v případě všech textových částí [drdplus.info](https://www.drdplus.info)
- obsah je opravdu rozsáhlý
  - a upravovat něco s 24876 řádky (současná velikost [PPH](https://pph.drdplus.info)) v jediném souboru, to se nedá

Proto mám vytvořený jeden [základ pro všechny obsahové stránky](https://github.com/jaroslavtyc/drd-plus-rules-html-skeleton) (a [druhý pak pro kalkulátory](https://github.com/jaroslavtyc/drd-plus-calculator-skeleton)),
kde řeším všechno kromě unikátního obsahu. Obsah samotný mám pak rozdělený do souborů podle selského rozumu, třeba `089a Volba zbroje.html`, `090a2 Tabulka zbrojí a přileb.html`, `090a Tabulka zbrojí a přileb - popis.html`, `090b Příprava parametrů.html` a tak dále (jo, řadím si to abecedně).
A když už se mi to na serveru lepí všechno dohromady, tak už je jen krůček k tomu, aby se to lepilo jen když je potřeba a jinak to do světa posílalo už poslepovaný celek.
Zahazování keše je v tomhle případě sakra jednoduché - jakmile na server přistanou nové změny, tak se keš smázne a zahřeje se do provozní teploty znova.
A otevřelo mi to dveře ke kešování jednotlivých částí stránky.

### Každý krok vpřed otevře dveře po stranách
Nejdříve jsem prostě lepil jednotlivé části k sobě, nahoru a dolu přidal co je potřeba pro zobrazení [HTML](http://polopate.jakpsatweb.cz/?page=jak) stránky a tím to haslo.
Jak se mi ale ulevilo díky zrychlenému načítání díky tomu kešování na serveru, tak už jsem mohl svou energii přesměrovat jinam a další v pořadí, co mi vadilo, bylo že spousta nadpisů a tabulek nemá odkaz. Když jsem chtěl někomu poslat tabulku rychlosti, musel jsem mu říct "že je to někde dole".

Takže jsem [sehnal nástroj](https://github.com/PhpGt/Dom), který schroupe připravenou stránku a několika málo příkazy nacpe ke všem nadpisům, ať už kapitol nebo tabulek, automaticky vytvořený odkaz. A hned bylo s [odkazováním na Tabulku rychlosti](https://pph.drdplus.info/#tabulka_rychlosti) veseleji.

Když se něco změní, tak se něco pokazí, a protože mi to nedošlo, tak jsem sestřelil [Pravidla pro hráče](https://pph.drdplus.info). Ono totiž *rozsekat* tak velkou HTML stránku, jakou Pravidla pro hráče jsou, a každý ten kousek popsat objektem, tak to sežere (alespoň v [PHP](https://php.net)) dost RAMky a jako každý správně vychovaný program, tak i ten pro sestavení HTML pravidel má pevně nastavený limit, přes který vlak nejede. V tomhle případě to je [výchozích 128 MB](http://php.net/manual/en/ini.core.php), což už nestačilo a přišel jsem na to až druhý den.
Neboj, pro příště už jsem pojištěný, testuji horem dolem funkčnost stránek nejen u sebe, než změny zveřejním, ale nově už i zveřejněné změny, právě abych se už takhle nenachytal (ale o testování až jindy, to je zas pohádka na další dlouhou dobrou noc).

Ovšem, když už jsem byl u té automatické změny obsahu (přidávání odkazů k nadpisům), tak už stačilo jen ždibíček se zasnažit, a najednou bylo vyřešeno zahazování keše ve tvém prohlížeči pro každý jednotlivý dílek, ze kterého je stránka poskládaná.
A ukládání stránky na tvé straně, ve tvém prohlížeči, aby se to všechno nenačítalo pořád znova, zase dostalo po roce smysl.

### Cílené sestřelování keše v prohlížeči
Tak naa serveru už jsem měl kešování vyřešené a mohl jsem se zas věnovat kešování na tvé straně, v prohlížeči.
Jak jsem psal na začátku, největším problémem u keše je vychytat ten okamžik, kdy se to má zahodit (úplně nový rozměr dal tomuhle problému (hlavně) Intel, který má v současnosti zatraceně velký problém se svými procesory, které vlastně [umožňují číst komukoli cokoli](https://www.root.cz/clanky/jak-funguje-spectre-a-meltdown-linux-na-orange-pi-a-zmena-algoritmu-dnssec/) - no, je to složité, ale základní kámen úrazu je právě touha kešovat co nejvíce výsledků a co nejméně je zahazovat).

Takže kdy se má zahodit keš nějaké části stránky? Třeba kdy se má načíst nový [obrázek koně](https://bestiar.ppj.drdplus.info/images/175.png?version=6434d6bef64654cef24f5529516a16e4)? Když se změní, jasně! K tomu se hodí prostý otisk obsahu, pro který kdysi dávno (v roce 1991, což je v IT dávno) vynalezl jeden chytrý pán [algoritmus MD5](https://cs.wikipedia.org/wiki/Message-Digest_algorithm), který byl sice původně určený pro skrytí hesel a dalších důvěrností a u kterého už dávno zjistili, že moc bezpečný není, ale pro rychlé získání krátkého, unikátního otisku (no dobře, [pidi šance na kolizi tu je](https://www.root.cz/clanky/hasovaci-funkce-md5-a-dalsi-prolomeny/)) libovolně dlouhého textu či obrázku naprosto stačí.
Fajn, tak mám unikátní otisk souboru (třeba ona kresba koně má `6434d6bef64654cef24f5529516a16e4`), ale co s ním? Někoho by napadlo měnit pokaždé jméno souboru, protože prohlížeč ho pak **musí** načíst, jelikož pod takovým názvem nic kešovaného ještě nemá, takže třeba `obrazek_kone_6434d6bef64654cef24f5529516a16e4.png`.

Unikátní název je zaručený způsob, jak donutit prohlížeč načíst soubor znovu, i kdyby se lišil byť jen o jediné písmenko, nebo u obrázku o jediný pixel, naštěstí ale nemusíme skutečně *přejmenovávat* soubory, protože z toho by byl pěkný bolehlav.
Stačí k odkazu, který ukazuje na chtěný soubor, něco unikátního přilepit. S obrázkem koně to pak vyřeším změnou odkazu na `obrazek_kone.png?6434d6bef64654cef24f5529516a16e4`, před otaznkem je název souboru, který se **nemění** a za otazníkem je takzvaný [query string (asi řetězec dotazu?)](https://en.wikipedia.org/wiki/Query_string), kde může být vlastně cokoliv a když je to celé dohromady pro tvůj prohlížeč něco nového, tak to považuje za nový odkaz a kešování je vyřešeno. DAlší velkou výhodou je, že odkaz na soubor platí pořád, i když už je jeho otisk dávno jiný, protože název souboru je vlastně pořád stejný a správný.

Inu, pravdou je, že ti na disku zůstane ta *stará verze* souboru, protože tvůj prohlížeč vlastně neví, že už to nepotřebuje (nikdo mu to neřekl), ale to už se jaksi moc neřeší, pardon (já to například kešuji na rok, takže "samo" se ti to smaže z disku za 356 dní, nebo když to výslovně prohlížeči přikážeš, ale s mazáním historie buď opatrný, můžeš si omylem smazat třeba hesla, uložená k oblíbeným stránkám).

Výsledkem je například u Pravidel pro hráče namísto přenesených 13.1 MB pouhých 0.4 MB (3 %) a místo 17.54 sekundy jenom 7.5 sekundy (je to přeci jen velká stránka a prohlížeč se zapotí, než ji poskládá). A když něco změním, třeba vzhled odkazů, tak se ti stáhne jen ten změněný mrňavý [soubor se styly](https://pph.drdplus.info/css/generic/anchors.css?version=f430266ecbf9ceaddc17690121fcb2f5). A to se počítá.

### Hudba budoucnosti
Tohle všechno směřuje, částěčně samovolně a podvědomě, částěčně řízeně, ke stránkám dostupným i bez internetového připojení. Jak si je jednou načtěš, už je budeš mít v prohlížeči uložené a při každé další návštěvě, kdybys třeba jel vlakem přes Pavlov, zasypala tě lavina, zavřeli tě do [Faradaiovy klece](https://www.mobilmania.cz/clanky/mobil-v-aute-a-faradayova-klec/sc-3-a-1108499/default.aspx) nebo tě postihla podobná offline katastrofa, tak se ti [drdplus.info](https://www.drdplus.info) a všechna jeho pravidla budou pořád načítat.

Ale k tomu se ještě musím dopracovat, jelikožs se budu se muset naučit a na stránkách zprovoznit [Web workers](https://developer.mozilla.org/en-US/docs/Web/API/Web_Workers_API/Using_web_workers). Ovšem skokově se tím přiblížíme k dalšímu milníku - mít pravidla v telefonu jako mobilní aplikaci.

Krleš!

---

- *předchozí [<< Vyskytla se nám Neviditelná soutěž](2018-02-16-vyskytla_se_nam_neviditelna_soutez.md)*