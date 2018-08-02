Boj
V DrD+ (do verze 1.0.B) je namísto výrazu iniciativa použito heslo Boj a mě se to moc líbí, protože na iniciativě jsem si leta lámal jazyk a i když je Boj jaksi příliš chlapský, tak v DrD se stejně hlavě řeší hlavně tahle přízemní (a jak moderní dějiny ukazují, stále žádaná) chlapská zábava, takže za mě palec nahoru.

A teď to horší, hodím si na Boj a… změní se pořadí akcí, toť vše. Fajn, bojovníci a několik málo dalších povolání může převahu v Boji přetavit ve speciální akci, ale je to takové krkolomné, vzácné a navíc málo používané, protože je velmi obtížné dosáhnout nějakého výsledku.
Takže všichni si házíme na Boj, aby někdo mohl něco udělat a zbytek znal své pořadí. Na první pohled to není nejhorší, ale po chvíli hraní to jaksi rychle zhořkne.

Docela dlouho jsme si lámali hlavy, co s tím a tady jsou naše myšlenky a hlavně závěry.


Prvotní myšlenka
> Nechci házet každé kolo na boj a automaticky měnit pořadí

Nejdřív jsme se zaměřili na to, že nás nebaví každé kolo házet na Boj. Prostě to otravuje a prd z toho.
Takže jsme hod zmrazili a rozhodli se, že co každý hodí na začátku souboje, to zůstane až do jeho konce.
Máš na Boj jedenáct? Fajn, budeš mít Boj jedenáct v každém kole až do konce souboje.

- an začátku každého kola se mi Boj resetuje na hodnotu v **prvním** kole

Na začátek to znělo slibně, pořadí bude pořád stejné a půjde o to, jak si s tím ti, kterým zrovna tenhle souboj nesedl (hodili na jeho začátku málo na kostkách), poradí.
K tomu nás napadali další možnosti, jako Počkám jedno kolo, nasaju Žár bitvy, čím současný souboj lépe pochopím a tím se mi zvýší Boj, což jsme chtěli coby obecnou dovednost pro každého. Proč ne.


Druhá myšlenka
> Chci více útoků za kolo

Od začátku nás dráždilo, že DrD+ se sice opírá o logaritmické tabulky, což vypadá ohromně, když si díky tomu můžeme spočítat vliv kouzla na rychlost nafukování balónu, ale přitom můžeme za jedno kolo (deset vteřin) zaútočit jednou.
Ve všech našich chlapsky romantických představách proklaje udatný ochránce slabších tři nenapravitelné záporáky během chviličky, kdežto při hře si hodíme každé kolo jednou na Boj, když máme štěstí tak jednou na útok (protože na nás záporák zaútočí první a my se mu bráníme zbraní, ztratíme útok) a pak jednou na obranu. Toť vše, nic moc.

A tak jsme začali špekulovat, jak tohle naroubovat na Boj. A pak nás místo šlaku trefil blesk z čistého nebe a pravil, “žádné roubování, Boj je rychlost akce, čím víc Boje, tím víc akcí”.
A tak začal závod v nápadech a otázkách.

- kolik boje “stojí” jedna akce?
- každá akce stojí “stejně”?
- kolik bodů Boje vlastně průměrná postava má každé kolo k dispozici?

Nakonec jsme se odpíchli od toho posledního, kolik Bodů boje máme k dispozici.
On je ten náš svět docela jednoduchý (popravdě každý svět):

- chceš kombinovat? a co jako? akce v boji jo?
  - a znáš své možnosti? že bude seznam akcí a jejich cena v bodech Boje jo?
    - a jaký je zdroj těch bodů Boje?

Aha, takže nejdřív potřebujeme znát zdroj (odkud se Boj bere a jaká bude cena akcí), potom teprve se můžeme bavit o akcích a teprve poté má smysl řešit jejich kombinace

- život na Zemi taky nejdříve potřeboval zjistit, že existují zdroje jako světlo, voda, uhlík, dusík a další prvky, aby díky tomu našel své možnosti v buňkách, aby jejich kombinacemi stvořil fotosyntézu, okysličenou krev, létání a tohle mohl kombinovat
  - ptáka s fotosyntézou sice nemáme, ale takový lenochod si pěstuje v kožichu mech, aby ho ze sebe mohl vyčesávat a jíst, prostě fotosyntézový borec


Zdroj Boje
> Kolik Boje dostanu?

Když si vezmeme současný stav, tak Boj mi ovlivňují nějaké ty základní vlastnosti, hod 2k6+
a pak spousta úprav jako dovednost se zbraní, únava a zranění, terén a tak.
Průměrný nýmand z Horní dolní má postih -3 k Boji za to, že vidlemi bodnul nanejvýš tak kunu a pak co mu padne na kostkách, takže má rozptyl Boje mezi -1 až 9, když nepočítáme krajní případy. Jak tímhle má platit nějakou akci?
S tak velkým rozptylem by nám měla pomoci pandemie jménem Magická šestka, která má za úkol co nejvíce mechanik převést na číslo šest, pokud to dává smysl. Hod na Boj chceme v rámci ní převést na 1k6+-

Magická šestka

> Převeďme, co má smysl, na menší rozptyl z původního 2k6+- na 1k6-

Šestka má už teď v DrD+ velkou roli:

- šestistěnná kostka (skláním se před mocí Člověče, nezlob se, které nám tenhle standard zavedlo v domácnostech)
- bonus o šest vyšší znamená dvojnásobek a o šest menší polovičku
- zatraceně mizerný úlovek dává postih k odpočinku -6 (ne, to ještě není schválená změna),
- Boj -6 je nyní nejmenší možný Boj, se kterým ještě mohu bojovat v tomto kole (možná je to naše domácí pravidlo, v oficiální příručce jsem to teď nenašel)


Upravený zdroj Boje
> Rozptyl 2k6+- byl moc velký, snížili jsme ho na 1k6+-

Fajn, takže průměrný nýmand z Horní dolní už nemá rozptyl Boje mezi -1 až -9, ale -2 až 3 (opět bez krajních případů).
Hmm, to jsme si pomohli, co s tím mínusem? Když chceme co se dá převést na šestky, tak by se nabízelo chtít za každou velkou akci šest bodů Boje (za útok, obranu se zbraní, útěk a pronásledování, kouzlení), jenže tenhle vidlák by dělal stěží figuranta. Něco tu smrdí…

Zjednodušme postihy v boji

> Boj musí být svižný

Když jsem si před lety psal poznámky k prvním nápadům na DrD+, jedna z vět zněla, že Boj musí být svižný, ale není.
Když neumíš se zbraní, tak máš jaké postihy? Víš to z hlavy? Já teda ne. Už jsme o tom přemýšleli a vypadlo nám z toho, že na začátku jsi nula a proto budeš mít všechno na nule a teprve s přibývajícími dovednostmi ti budou přibývat bonusy. Za každý jeden stupeň dovednosti Boje s typem zbraně pěkně bonus +1 ke všemu v boji. +1 k Boji, k Útoku, k Obraně a nazdar.

Fajn, takže náš nýmand má Boj nula, jo, to jsme se fakt hnuli…

Každý účastník boje má aspoň jednu akci

> Potřebujeme základní zdroj Boje

A tak jsme se dostali k tomu, že každý účastník boje má na začátku Boj +6, k tomu co hodí (dalších +1 až +6, když nepočítáme krajní případy) a najednou je z toho jedna až dvě akce. To už by šlo.

Tenhle základ se nám líbí, ale vyvstaly tím nové otázky.


Kombinace jsou základ boje
> Jak zařídit, aby každý mohl v boji něco dělat?

Usadili jsme se v myšlence, že Boj bude 6 + další úpravy, což ve většině případů dá jednu až dvě akce.
Jenže krom bonusů jsou tu stále i postihy. Postih za nedostatečnou sílu (kterou chceme zjednodušit na -1 ke všemu k boji za každý chybějící bod síly, namísto současné diagonální tabulky), postih za únavu a zranění a určitě by se ještě něco našlo.

- takže když mám menší Boj než 6, nemůžu dělat nic?

Kolik stojí akce

> Dělej si co chceš, když na to máš

Potřebovali jsme jednoduché pravidlo, které zaškatulkuje akce do “ceníku Boje”, protože dříve nebo později se hráči dostanou k akci, kterou pravidla nepopisují a oni pak budou dumat, kolik času a energie, tedy kolik Boje by taková akce měla zabrat.
U toho jsme vyšli ze současného rozdělení činností podle duševní náročnosti na automatické, s volným soustředěním, plným soustředěním a transem.

- trans zabere celé kolo, pokud není výslovně uvedeno jinak
  - ale těžko se nám vymýšlí příklad, kdy by měla činnost podobná transu trvat kratší dobu než celé kolo, leda snad nějaké chvilkové mdloby…
- činnost s plným soustředěním zabere 6 bodů Boje
  - útok
  - obrana se zbraní či štítem
  - útěk
  - pronásledování
  - poctivé přezbrojení (s uklizením původní zbraně na snadno dostupné místo a připravení nové)
  - vytažení předmětu z batohu
- činnost s volným soustředěním zabere 3 body Boje
  - mluvení
  - rychlé přezbrojení (zahození původní zbraně a připravení nové)
  - vytažení předmětu z kapsy
- automatická činnost nezabere nic
  - obrana uhýbáním
  - výkřik strachu
  - přivření očí při záblesku

Všimni si, že obranu uhnutím, tedy bez použití zbraně či štítu, můžeš provést v našem návrhu kdykoli, dokonce i když už ti žádné body Boje nezbyly. Počítáme ji totiž do běžného pohybu na bojišti a dáváme tak možnost bránit se komukoli kdykoli.
Tím samozřejmě vyskakují čertíci typu “zloděj všechen Boj nacpe do útoku a obranu vyřeší uhýbáním”, ale to jsou provozní problémy, které nás nezastraší a které budeme řešit.

### Boj už není jen o rychlosti první akce
> A kde je ta náhoda?

Z poněkud neprůhledného čísla Boj, které přidávalo nové možnosti (finty) pouze několika málo vyvoleným a ostatním jen povinnost čekat na ty rychlejší, jsme udělali obecný zdroj, který potřebuje každý.
A najednou je na obtíž na prvotní změna, že na Boj se bude házet jen jednou na začátku souboje. Najednou jiný Boj nemíchá jen pořadím a nepřepíná tupě mezi stavy "teď můžu beztrestně útočit" a "jestli se budu bránit zbraní, přijdu o ten jeden jediný útok, to jediné co můžu tohle kolo souboje efektivně udělat", ale dává nám možnost více akcí, určuje, zda můžu v Boji provádět další kulišárny a tudíž jiný Boj na začátku kola může pěkně zamíchat s akcemi, které se tohle kolo budou dít.
Hod na Boj každé kolo zase dostal smysl.

- ~~každé kolo se mi Boj resetuje na hodnotu v prvním kole~~

## Další kombinace
> Zdroj máme, základní možnosti máme, tak přidejme další možnosti, ať se nám hezky kombinuje

Jelikož jsme Boj konečně identifikovali a víme, že je to vlastně **čas**, ve kterém můžu něco provádět, tak si teď můžeme hrát s časem

    - něco lze určitě udělat rychleji
        - sice nebude výsledek tak dobrý, ale někdy je rychlost důležitější
    - něco lze určitě udělat poctivěji
        - sice nad tím strávím více času, ale za to bude výsledek výstavnější

Takže když mám dejme tomu Boj deset, tak bych mohl šest bodů Boje použít na útok a zbylé tři body Boje na odfláknutější obranu
    - za každý jeden chybějící bod Boje budu mít postih -1 ke všemu, co v danou chvíli dělám
        - v našem příkladu jsem na obranu použil namísto potřebných šesti bodů Boje pouze čtyři, tak mám postih -2 ke všemu, co v téhle akci provádím a jelikož jsem se rozhodl pro obranu, tak mám postih -2 k obraně

A obráceně bych se mohl rozhodnout, že obranu nepotřebuji, takže se vrhnu po hlavě do útoku, k šesti bodům Boje potřebným prot útok přidám čtyři další a hned zatlačuji nepřítele do kouta
    - za každý bod Boje navíc dostanu bonus k právě prováděné akci +1, takže za čtyři body Boje navíc dostanu +4 body ke všemu, co zrovna provádím a protože jsem se rozhodl pro útok, tak mám +4 k útoku
    - ono to nezní špatně, ale zároveň jsem se tím připravil o druhou, byť zbrklejší akci

### Nekonečný počet akcí
> Každý systém má díru


Tím jsme se dostali k vykukům, kteří chtěli útočit s postihem -6, tedy že by nezaplatili **žádný**n Boj a mohli by tak útočit do nekonečna.

První návrh na řešení takové situace byla povinnost použít na každou akci alespoň jeden bod Boje. Trvalo to asi deset minut, než z nadšení nad řešením zbyla frustrace z pokračování problému.
Ti samí vykukové by samozřejmě použili na každou akci jen jeden bod Boje, takže když mají Boj deset, tak můžou provést deset akcí.

Přišlo nám to ještě chvíli dobré, protože tím by vznikly herní situace, kdy hostinský zurřivě buší do ožraly v touze vymlátit z něj alespoň část útraty, zatímco ožrala analyzuje, zda jde o komára či jiný bodavý hmyz, ale pak začaly vyskakovat jak houby po dešti situace, kdy se tohle dá zneužít a navíc by to hodně zdržovalo ostatní hráče.

### Počet akcí je znám hned
> Co sis hodil, to máš

Jak už to bývá, to nejjednodušší řešení je to nejlepší. Když většina akcí stojí šest bodů Boje a ty kratší jsou spíše doplňkové (mluvení, tahání králíků z kapes), tak máš tolik akcí, kolik ti body Boje **bez úprav** na začátku dovolí. Když máš Boj sedm, tak můžeš provést jednu celou a jednu hodně odfláknutou akci. A dost. Klidně si pak hraj s body Boje, přelévej je sem a tam mezi akcemi, ale více než dvě akce už z toho nevykřešeš.

Situace jako "I přes bitevní vřavu budu hulákat na bandity, v jaké že jsou bezvýchodné situaci a z kapsy zatím vytáhnu bouchací kapsli", což bude chtít dvě tříbodové akce (protože to jsou dvě akce s volným soustředením), necháme na Pánu jeskyně, který jistě moudře rozhodne, že tím se vyplní jedna *běžně velká* akce za šest bodů Boje a nechá hrdinu zakončit svůj mocný projev prásknutím kapsle, aniž by za to vyžadoval další body Boje.

### Boj je časová osa
> Až to přijde, tak to přijde

Jelikož jsme byli s posledním návrhem Boje a počtem akcí i po několika dalších debatách spokojeni, zaměřili jsme se na další otázku

 * jak je to s pořadím akcí, když si zpřeházím body Boje?

Už na začátku návrhu nám došlo, že Boj je vlastně čas. Jedno kolo bojování trvá deset vteřin (což měnit nechceme) a do nich se má vměstnat tolik akcí, kolik si hráči a Pán jeskyně z bodů Boje obhájí.
Pokud má ten nejrychlejší s nejrychlejších Boj 17, tak se dá udělat čára, která začíná nulou, končí sedmnáctkou, a celé je to ještě rozdělené ná úseky po šesti, takže je vidět, že nejrychlejší borec má *sedmnáct, (17-6=) jedenáct, (11-6=) pět*, to jest tři akce a tu poslední trochu uspěchanější. Ostatní postavy budou načmárané někde mezi tím, občas se jim začátky akcí potkají, většinou minou.

Pro základní přehled, kdo je jak rychlý, tak dobrý, i když je toho malování nějak moc. Jenže teď si ten nejrychlější hráč přelije Boj z poslední akce do první, takže tu první nafoukne na dvojnásobek a poslední zmizí a teď co. Bude jeho první akce pořád první?

### Časová hranice akce
> Něco končí, něco začíná

Boj je čas a akce můžeš dělat pomaleji nebo rychleji, když spotřebuješ více nebo méně Boje, tedy času. Čas sám tím ale ani nezpomalíš, ani nezrychlíš, ten si plyne pořád stejně.
Takže když se první hráč rozhodl svou poslední akci obětovat a čas z ní použít na tu první, tak tu první provádí dvakrát **pomaleji** a tudíž jí i dokončí až za dvojnásobnou dobu, takže sice svou akci začne jako první, ale její výsledek, její efekt přijde až mnohem později.
A co nás zajímá více, jestli se na mě někdo zle podíval a já vím, že mi půjde po krku, nebo že už mě konečně nachytal na holičkách a pronikl mou důmyslnou obranou, takže mám monokl jak státní úředník? Zajímá nás, kdy přijde výsledek.
A co když stojím proti čarodějovi, který zrovna začíná kouzlit? Mám čekat, až z něj vyletí ohnivá koule a pak ho teprve citlivě vyrušit štítem do obličeje? Hmm, tady nás zajimá, kdy akce začíná.

Výsledek útočné akce se dostaví **někdy** během celé akce, podle toho, jak se zrovna sféry vyspaly. Když na útok spotřebuju půl kola, což je asi tak pět vteřin, a protivníka **nezraním**, tak jsem ho pět vteřin oťukával, obíhal, dělal na něj urážlivé posunky a nic z toho. Pokud jsem ho ale zranil, tak někdy behěm těch pěti vteřin jsem se mu dostal na kobylku a praštil ho. Ale není v ničích silách předem určit, jestli to bylo na začátku akce, uprostřed nebo někde na konci.

Zato když kouzlím a na kouzlení spotřebuji polovinu kola, tak vyvolat kouzlo opravdu trvá oněch pět vteřin a terpve na jejich konci se kouzlo konečně plně projeví a **po celou tu dobu** mi může někdo dát bolestivou stopku.

Aha, takže kdo je nejrychlejší, ten si "odútočí" a "odkouzlí" to svoje, zatímco ostatní čekají poslušně na výsledek a pak zas dostanou štafetu akcí oni? Má dáti, dal? Něco tady smrdí.

### Boj je chaos se záblesky výsledků

Útok není o postávání v koutě a "až na mě přijde řada, tak jednou uděřím", jak je to bohužel vidět v některých počítačových hrách, ale o intenzivním oťukávání nepřítele a hledáním slabého místa či chyby.
Účastníci boje se tu řežou hlava nehlava, tu zas kolem sebe jen krouží, plivají po sobě, šklebí se, uskakují, obíhají nepozorné a pomalé, schovávají se za společníky, prchají aby zas skočili do boje z jiné strany a vůbec je to zmatek, ve kterém je nějaká časová osa spíše zbožné přání, než zákon.
Ony totiž ty akce dost často **začínají** ve stejný čas
    - zatímco dotírám na skřetího kuchaře, považujícího ho za šéfa celé bandy, tak v tu **samou** dobu odrážím útoky jejich stopaře. Body Boje pouze udávají, komu se povede výsledek dříve.

Proto by si klidně všichni útočníci mohli hodit na útok bez nějakého pořadí, obránci si hodit proti nim na obranu a pokud nikdo není zasažen, vůbec by se nějaké pořadí nemuselo řešit.

Pořadí začne mít vliv **až** když

  - akce byla úspěšná
  - výsledek akce něco ovlivnil
  - vliv akce se projeví ještě v tomto kole

Tu složitost s pořadím nám tedy přináší až ten poslední bod - takové vlivy, které se projeví ještě v **tomto** kole.

### Vlivy v tomto kole
> Jak rychlý je okamžik?

Pokud budeme přemýšlet o jednom kole boje jako o deseti vteřinách, u kterých si dokážeme představit, že se během nich stalo spoustu věcí, pokud budeme těch deset vteřin ještě drobit na jednotlivé dílky podle bodů Boje, tak se zavřeme do simulátoru atomových hodin, kde **všechno jde za sebou**, nic se nestane zároveň (i vzhledem k oficiálnímu pravidlu, že když máš stejný Boj, tak vítězí ten s vyšší obratností).
Ono to zní úžasně reálně, ale pouze dokud neopustíme laboratoře Teoretik s.r.o. a nevyzkoušíme si to na vlastní kůži.

  - spoustu zranění si uvědomíme až po nějaké chvíli, stejně jako když sražená srnka ještě stihne odběhnout na pole, kde teprve padne
  - spoustu znás své přepoklady opírá o dřevárny, kde se zásah počítá okamžitě, ale když se pak porveme o holku, tak jde hlášení zásahů stranou
  - boj je naprostý zmatek a tvrdit s určitostí, že blesk zabil bojovníka těsně před dopadem jeho meče lze pouze na základě zpětného rozboru videzáznamu, který do DrD+ zavádět nehodláme

Dostáváme se k tomu, že onen dokonalý nápad `Boj = čas`, respektive že to jsou *jednotlivé, velmi přesné časové dílky desetivteřinového kola*, je krátkozraká hloupost.

A teď co s tím?

Od začátku víme, že Boj určuje *rychlost akce*, kdo má větší Boj, je rychlejší. Fajn. Takže kdo má vyšší Boj, provede **všechny** své akce jako první, po něm všechny ten druhý, po něm všechny ten třetí a tak dále. Pokud je mezitím ten další vyřazen, už se ke svým akcím nedostane.
Takže jsme udrželi smysl Boje jako rychlosti reakce a z jednoho účastníka boje jsme udělali chrliče akcí, zatímco ostatní hráči se budou dloubat v nose a čekat **co na ně zbyde**, neboli jestli pro jimi předem nahlášené akce ještě zbyde ten nahlášený cíl. To smrdí nudou a zklamáním.

A co když ten původní smysl Boje, tu rychlost reakcí zahodíme? Co když zůstaneme jen u toho, že Boj určuje počet akcí a hotovo?
Hráči mohou dělat své akce **bez čekání** na ostatní a i kdyby jeden z nich během současného kola padnul, ještě pořád všechny své pečlivě naplánované akce dokončí (což samozřejmě platí i o nepřátelích).
Pokud bychom se rozhodli, že nejmenší časový úsek, ve kterém má smysl vnímat boj, je jedno kolo, tak se nám život dost zjednoduší a vypadá to, že boj tak bude i zábavnější.

  - budeme testovat boj, ve kterém se **všechny** efekty projeví až na **konci** kola, ať už je to zranění, útěk, paralýza či zastrašení nepřítele

Tahle myšlenka plynule navazuje na [poznámku ShadoWWWa na RPG fóru](https://rpgforum.cz/forum/viewtopic.php?f=238&t=15032&start=30#p539414), který zmiňuje, že *realističnost* a *uvěřitelnost* není to samé. A pak je tu samozřejmě hratelnost, nebo-li **zábava**, která hrou vznikne. A jestli něco dokáže zábavu spolehlivě zabít, tak je to čekání.
A čekat, až na mě přijde řada a ještě k tomu se dočkat toho, že moje ukrutně promyšlená akce už nemá smysl, protože někdo hodil na kostce víc a ještě k tomu nemám možnost ji změnit, to je k vzteku.

### Povinnost hlášení akcí
> Žalovat se nemá, ale hlásit se to musí!

Když chci provést akci, která ovlivňuje ostatní, **musím** ji nahlásit na začátku kola. V průběhu kola už můžu provést jen spontální, instinktivní akce, což jsou v naprosté většině jen ty, které se týkají přímo tebe.
Předem nahlášené akce můžeš **kdykoli** vymněnit za instinktivní, ale nemůžeš už **měnit** předem zvolený poměr Boje ("velikost" akce).

   - pokud jsi měl Boj sedm, pět bodů Boje ses rozhodl použít na útok a tři na svou obranu, můžeš klidně uprostřed boje oznámit, že svou akci útok rušíš, aby ses mohl bránit
     - na útok jsi použil pět bodů Boje, takže tvá obrana, za kterou jsi útok na poslední chvíli vyměnil, má zase sílu pět bodů Boje
         - může mít méně (i když nevím, proč bys to dělal), ale **nemůže** mít více

Instinktivní akce jsou:
  - obrana sebe samého
  - útěk
  - mluvení a gestikulace "do větru", bez cíle
    - kouzlení **bez cíle** nebo na sebe sama sem také spadá, ale pamatuj, že efekty kouzel se vyhodnocují až na **konci** kola, takže si dobře rozmysli, jestli to k něčemu bude 

Některé akce si osvojíš jako instinktivní později, například bojovník dokáže instinktivně zareagovat na napadeného společníka a změnit svou akci na **jeho** obranu, přestože to běžný občan bez předcozího rozhodnutí **efektivně** nesvede.
        
Z instinktivních akcí vyplývají dvě zajímavosti:

 - **jakoukoli** akci můžeš změnit na poslední chvíli na instinktivní, například na obranu sebe sama (ale má to svá **ale**)
   - instinktivní akce je jen taková, kterou si jako instinktivní obhájíš před ostatními
     - instinktivní je *například* obrana tou zbraní, kterou jsi chtěl použít k útoku, ne přezbrojení na "lepší" k obraně na posleddní chvíli (bojovníci specializovaní na obranu, zloději co zrovna nemají v ruce dýku a hraničáři, kteřím hrozí zničení luku, tohle mohou změnit)
 - aby mělo smysl měnit nějakou akci na instinktivní, budeš muset **počkat**, co dělají ostatní a reagovat až na ně
   - tím jsme se vlastně dostali zpět k Boji jako plynutí času, ale tentokrát je to přirozené plynutí, takové, které ovládají všichni na bojišti
   - **čekání** je vědomá akce a **musíš** ji ohlásit předem
     - pokud **všichni** čekají, tak na sebe prostě kolo zírají a aspoň je chvíli klid

### Převodník akcí
> Co bylo, bylo

V [Pravidlech pro hráče](https://pph.drdplus.info/#dalsi_bojove_akce) jsou tyto zvláštní bojové akce, které rušíme, protože je zvládneš pomocí bodů Boje a čekání na akce ostatních:

  - [Bezhlavý útok](http://pph.drdplus.loc/#bezhlavy_utok): +2 k Útočnému číslu, +2 k Základu zranění, -5 k obraně
    - podobného výsledku dosáhneš, když ze své akce Obrana odebereš dva body Boje a máš tak -2 k obraně a tyto body Boje si přidáš k akci Útok, takže získáš +2 k Útoku
      - poměr je výhodnější, což je schválně, protože postihování hráčů za to, že chtějí urychlit boj, nám vadil a zároveň je nyní snazší se bránit, když mohu kteroukoli akci zrušit a namísto ní se bránit (pokud jsem byl trpělivý a čekal jsem) 
      - poznámka: plánujeme zrušit oddělené Útočné číslo a Základ zranění, které chceme sloučit za jedno číslo (Útok), které odečteš od Obrany a rozdíl jsou **výsledná** zranění
        - například Útok 7 proti Obraně 6 znamená 1 bod Zranění
      - poznámka: plánujeme sloučit Obranné číslo a Ochranu zbroje do jeddiného čísla Obrana
        - například Obranost 4 a pobíjená zbroj s Ochranou zbroje +3 dají Obranu 7 (už víme, že chybějící Síla bude rovnou výsleddný postih ke zbroji, žádná tabulka, ale ještě nevíme, jestli dovednost [Nošení zbroje](http://pph.drdplus.loc/#noseni_zbroje) bude snižovat postih, jakkoli to zní logicky, nebo zvyšovat bonus, podobně jako to bude u dovednosti [Boje se zbraní](http://pph.drdplus.loc/#boj_se_zbrani))
  - [Soustředení na obranu](http://pph.drdplus.loc/#soustredeni_na_obranu): +2 k BČ a +2 k OČ, ale nemůžeš v tomto kole útočit
    - tohle se dá řešit opět přeléváním bodů Boje a pokud tě útok nezajímá vůbec, tak prostě všechny body Boje použiješ na obranu
      - opakujeme, že **během** boje už nelze měnit poměr použitých bodů Boje, takže nemůžeš dodatečně oznámit, že ze dvou běžných útoků, na které jsi použil například šeste a pět bodů Boje, uděláš jednu *skvělou* **instinktivní** obranu, na kterou bys použil jedenáct bodů Boje. Můžeš tyto útok proměnit pouze ve dvě obrany, jednu s použitím šesti a druhou s pěti body Boje. Tu *skvělou* obranu bys musel ohlásit předem a to ještě proti konkrétnímu nepříteli
  - [Krytí spolubojovníka](http://pph.drdplus.loc/#kryti_spolubojovnika): ...*Bohužel ochránce nemá v tomto kole možnost provést vlastní útok.*
    - vše zůstává stejné, **až na** poslední větu, že ty jakožto obětavý obránce ztratíš útok - musíš prostě jen použít jednu ze svých akcí a je samozřejmě na tobě, kolik bodů Boje na tuto Obranu spolubojovníka použiješ
    - tuto akci samozřejmě musíš ohlásit předem na začátku kola, tedy pokud nejsi bojivník s naležitou schopností, která z Krytí spolubojovníka dělá instinktivní akci
  - [Mířená střelba](http://pph.drdplus.loc/#mirena_strelba) - Za každé kolo míření s postihem −2 k BČ si přičte +1 k ÚČ. Celkově může postava mířením získat bonus +3 k ÚČ.
    - kolik bodů Boje na střelbu použiješ, o tolik se ti Útok zvýší
    - míření se tím redukuje nejdéle na jedno kolo, protože body Boje do dalšího kola nepřecházejí a mířit déle než deset vteřin má možná na nehybný terč, nikoli na objekt ve víru boje
    - poznámka: tohle může být ještě kámen úrazu, protože střelec se tímto může stát velmi nebezpečným (například v kombinaci s už tak velmi nebezpčenými steřleckými schopnostmi zloděje), bude to chtít **pořádně** otestovat
    
Nejsme si ještě úplně jisti, že rušení výše uvedených zvláštních akcí je nejlepší nápad, minimálně kvůli dobrým názvům, které zlepší popis boje.

#### Boj a pohyb

V originálním přehledu akcí jich ještě pár zbylo a některé z nich mají jedno společné, **pohyb**.
Jakmile se řekne *pohyb*, obvykle se k tomu začne přilepovat i *rychlost* pohybu. Jakmile začneme řešit rychlost pohybu v něčem tak složitém, zmatkovitém a náhodném, jako je boj, tak se dostaneme tam, kde jsme před chvílí byli s Bojem coby *přesnými časovými úseky*.
Přestože pravidla řeší [Rychlost](http://pph.drdplus.loc/#rychlost) (jako kombinaci Síly a Obratnosti), tak 
 

## Hrajte se skrytými akrtami
> Život bez překvapení je jako vtip bez pointy

Doporučujeme připravovat akce skrytě, ideálně na lístečcích, kam napíšeš svou akci (které se často opakují, takže za chvíli budeš mít balíček většiny akcí už připravený) a položíš je lícem dolů **před** cíl.

> TODO níže je původní text, který vznikl halabala a ze kterého čerpám pro pořádnější popis výše.
Jestli ho chceš číst, budiž, ale je poněkud zmatený a některé myšlenky v něm nejsou ještě zralé.

Boj je *čas* na akci, kterou provádím, dokončím po spotřebování Boje, nikoli na začátku - pokud útočím s pomocí Boje navíc z jiné akce, třeba veškerý Boj 10 dám do jednoho útoku, tak neútočím jako první, protože mám Boj deset, ale jako poslední, protože útok dokončím, až když spotřebuji všechen vložený Boj, tedy na nule.

## Magická šestka

- na začátku boje mám Boj 6 + opravy (hlavně podle zbraně a použité vlastnosti) + +1k6+-
- ~~každé kolo se mi Boj resetuje na hodnotu v prvním kole~~
- každá akce, která vyžaduje plné soustředění, mě stojí 6 bodů Boje
    > sedlák Pecivál brání svačinu před liškou, má na Boj 6 + hodil 3 a svačinu brání hráběmi, se kterými umí sice dobře, ale ne bojovat, takže Boj = 9, na obranu spotřebuje 6 bodů Boje, na víc mu už nezbude (tři body mu propadnou, pokud je nevyužije na úpravu akce), oproti tomu zkušená liška má celkový Boj 13
    - akce s plným soustředěním jsou
        - útok
        - obrana
        - přezbrojení (tomu lze snadno snížit obtížnost připraveností, zkušenostmi a zahozením první zbraně, tedy jejím neuklízením)
        - velký pohyb (útěk, pronásledování)
        - vyjmutí předmětu z batohu (dej přednost selskému rozumu, pokud chceš vyndat kámen z volné kapsy, moc času ti to nezabere)
- obrana puouze uhýbáním (beze zbraně a bez štítu) žádný Boj nestojí, je to součást pohybu na bojišti
    > sedláka Pecivála liška překvapí druhým útokem ve stejném kole, na obranu hráběmi už Pecivál nemá body Boje a tak musí pouze uhýbat
- za jeden bod Boje se můžeš posunout o jeden sáh (mnohá povolání se dokáží pohybovat v boji úsporněji, ale o tom až později)
    - pozor na to, že každá akce s plným soustředěním stojí 6 bodů Boje, takže posun o jeden sáh ti udělá ze šesti bodů Boje pouhých pět a s tím už velké divadlo nepředvedeš
    - mezi pohyb se nepočítá výpad vpřed a opětovné ustoupení na původní pozici, ani vzájemné kroužení, ale o posun mimo původní středobod, aniž bys dal protivníkovi záminku k nějaké výhodě
- "zadarmo" se můžeš kdykoli dát do běhu (útěk, pronásledování), ale u takového pohybu máš -6 ke všem činnostem od "teď" do konce příštího kola (ztratíš kontakt s bojem)
    > "sedlák Pecivál zpanikaří, protože liška na nej dotírá nepřírozeně a beze strachu a dá se proto v půlce svého kola na nepromyšlený úprk, takže po své první akci, kdy spotřeboval 6 bodů Boje a zbývají mu 3, tyto 3 body Boje zahazuje a až do konce příštího kola má ke všemu kromě pohybu postih -6, tedy hlavně k Obranně. Kdyby trochu přemýšlel, tak by nejdříve použil 3 body Boje na posun o 3 sáhy a teprve poté se dal na útěk. Dlužno dodat, že lišku tím přestal zajímat, protože od začátku chtěla pouze jeho svačinu pro svá hladová liščata."
- ten útěk to chce ještě promyslet
    - co například, že by mu to až na příští kolo dalo bonus +6 k Boji, aby byl rychlejší v reakcích, ale nemohl by provést nic jiného, než onen útěk?
    - na útěku je (odpoutání z boje se mu povedlo když) ho nikdo před útěkem nezranil či jinak nezastavil (podražení nohou, chycení do lasa či bičem)
    - pronásledování bude to samé?
    - hned první kolo bude počítat svou plnou Rychlost, nebo se první kolo bude počítat vzdálenost podle jeho Boje (s +6 bonusem za nahlášený útěk?), takže někdo s vyšším bojem může zareagovat a pronásledovat ho a až potom bude prchat plnou Rychlostí?
    > "Liška se nechala sedlákovým úprkem trochu překvapit, ale ukolíbaná úspěchem z ulovené svačiny se v klidu zakousla do voskovaného papíru, aby zjistila, že je prázdný a po salámu už jen voněl, v hlavě jí vyskočilo kňučení hladových liščat a s vrčením s vrhla za sedlákem. Sedlák má tedy díky nahlášenému útěku bonus +6 k Boji a díky tomu bude na konci tohoto kola daleko 9 + 6 = 15 sáhů a pokud ho liška v tomto kole nekousne či alespoň nechytne za nohavici, tak už půjde o závod jejich nohou, ale hlavně se tím sedlák začne nebezpečně přibližovat k vesnici. Liška proto začne s pronásledováním a svých 13 bodů Boje použije na pronásledování, protože neví, že sedláka toto kolo nedožene a je tudíž na konci kola kousek za ním, takže sedlák se dostante do tempa a začne závod nohou (ve kterém je liška ve výhodě, takže se situace bude zřejmě opakovat, dokud jeden z nich nedosáhne úspěchu - liška jídla a sedlák klidu)"


#### Bič
- v boji dobrý tak na štípance a na odzbrojování, ale dobrý je na pronásledování, kdy uprchlíkovi při úspěšném útoku omotá nohy a podrazí ho (ten si nepočítá zbroj).
    
### Úpravy Boje
Boj je tedy každé kolo stejný, ale pouze *pokud to tak necháš*

- téměř každá akce lze uspěchat, nebo pozdržet
    - pokud budeš pospíchat, tak výsledek akce nebude z nejzářnějších, ale budeš rychlejší než ostatní
        - za každý bod Boje, který získáš spěchem, dostaneš postih k jakékoli činnosti -1
    - když si dáš na čas, bude mít tvá snaha lepší výsledky, tedy pokud ti ji mezitím někdo nepřekazí...
        - za každý bod Boje, který obětuješ na vyčkávání, dostaneš bonus k jakékoli činnosti +1
    - stále platí, že každá akce vyžadující plné soustředění stojí 6 bodů Boje
        - plné soustředění vyžaduje útok, obrana, kouzlení, projev, ale už ne běžné mluvení a už vůbec ne instinktivní reakce jako řev bolesti, ucuknutí, nehraný smích či zamkrnání
    - jak spěchání, tak vyčkávání musíš ohlásit na začátku kola a to včetně akce a cíle
    
    
- s útokem si můžeš dát na čas a za každý jeden bod Boje, který obětuješ, se ti zvýší jeden útok o jedna, nanejvýš ale o šest
    - musíš ale předem hlásit, že to provedeš
    - musíš předem vybrat cíl
    - pokud na tebe mezitím někdo zaútočí, může se snadno stát, že už nebudeš mít body Boje na obranu zbraní
    - stále ti samozřejmě musí zbýt šest bodů Boje na onen útok
- útok můžeš uspěchat a za každé snížení útoku o jedna si zvýšíš Boj o jedna, nanejvýš ale o šest
    - což se hodí hlavně pokud se zbraní dost neumíš, nebo je těžší, než je ti příjemné, nebo potřebuješ zaútočit jako první (změní to pořadí) 
    - musíš ale předem hlásit, že to provedeš
    - musíš předem vybrat cíl
        > sedlák Pecivál už má plné zuby věčného odhánění lišky a zkusí ji překvapit nenadálým útokem, vezme to zhurta a obětuje šest bodů útoku, aby získal šest bodů Boje a byl první, což se mu zdaří (má boj 9 + 6 = 15, kdežto liška má stále 13), i když mu to zníží útok o šest, a překvapí nejen lišku, ale i sebe a hlavně hrábě, které tak zbrklý pohyb nevydrží a prasknou (jak PJ na základě velmi malého útoku rozhlodl)
    - tyto body Boje navíc ti nezbudou na jinou akci, za uspěchaný útok musíš zaplatit vždy alespoń jednímm bodem původního Boje a k tomu všemi takto získanými body navíc, celkem alespoň šest bodů
        > sedlák Pecivál tímto zbrklým útokem přišel o těch šest bodů Boje navíc a k tomu o jeden původní, zbylo mu tedy 8 bodů Boje, což se dá použít ještě na jednu akci 
    - útok můžeš uspěchat kolikrát chceš
        > rozzuřený sedlák Pecivál, zdrcený ztrátou rodinných hrábí, se rozhodne lišku mlátit hlava nehlava a z Boje 9 obětuje vždy jeden bod na zbrklý útok a šest si přidá, takže každý útok má -6 k útoku a první je proveden s rychlostí (9 + 6 = ) 15, druhý (8 + 6 = ) 14, třetí (7 + 6 = ) 13 a protože je liška překvapená, tak se nevzmůže na útok a pouze se brání a hlavně uhýbá
- obranu můžeš také uspěchat, což se hodí, když sebe nebo spolubojovníka chceš bránit zbraní, ale nemáš na to body Boje, tak obranu uspěcháš (provokací, aktivním odrážením nepřítelské zbraně a podobně), opět v poměru jeden bod Boje za jeden bod Obrany, nevíce šest  
    
### Další nápady

Bojovník při úspěšném odhadu protivníka zistí, jaký má počátěční Boj (a může podle toho poznat, jakých akcí je schopen)
Útok se musí hlásit předem, obrana ne