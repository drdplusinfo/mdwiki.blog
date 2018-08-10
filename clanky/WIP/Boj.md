# Boj

## Od boje chceme víc
V DrD+ (do verze 1.0.B) je namísto výrazu *iniciativa* použito heslo *Boj* a mě se to moc líbí, protože na iniciti... inaicitiv... iniciativě jsem si leta lámal jazyk a i když je výraz *Boj* jaksi příliš chlapský, tak v Dračím doupěti se beztak řeší hlavně tahle přízemní (a jak moderní dějiny ukazují, stále žádaná) chlapská zábava, takže za mě palec nahoru.

A teď to horší, hodím si na *Boj* a… změní se pořadí akcí, toť vše. Fajn, bojovníci a několik málo dalších povolání může převahu v *Boji* přetavit ve speciální akci, ale je to takové krkolomné, vzácné a podle našich zkušeností navíc málo používané, protože je velmi obtížné dosáhnout nějakého výsledku.

> takže **všichni** si házíme na *Boj*, aby **někdo** mohl něco udělat a zbytek z toho měl jen své pořadí

Na první pohled to není nejhorší, ale po chvíli hraní to jaksi rychle zhořkne, ostatně jako každá nadbytečná povinnost.

Docela dlouho jsme si lámali hlavy, co s tím a tady jsou naše myšlenky a hlavně závěry.


## Prvotní myšlenka
> Nechci házet každé kolo na boj a jenom si tím automaticky měnit pořadí

Nejdřív jsme se zaměřili na to, že nás nebaví každé kolo házet na *Boj*. Prostě to otravuje a prd z toho.
Takže jsme hod zmrazili a rozhodli se, že co každý hodí na začátku souboje, to zůstane až do jeho konce.

> hodil jsi na *Boj* jedenáct? Fajn, budeš mít *Boj* jedenáct v **každém** kole až do konce souboje.

- na začátku **každého** kola se tedy *Boj* resetuje na hodnotu z **prvního** kola

Na začátek to znělo slibně, pořadí bude pořád stejné a půjde o to, jak si s tím poradí ti, kterým zrovna tenhle souboj nesedl, protože hodili na jeho začátku málo na kostkách.

K tomu nás napadali další možnosti, jako *Počkám jedno kolo*, abych nasál *Žár bitvy*, čímž současnou bitvu lépe pochopím a tím se mi zvýší *Boj*, což jsme chtěli coby obecnou dovednost pro každého. Proč ne...


## Druhá myšlenka
> Chci více útoků za kolo

Od začátku nás dráždilo, že DrD+ se sice opírá o logaritmické tabulky, což vypadá ohromně, když si díky tomu můžeme spočítat vliv kouzla na rychlost nafukování balónu, ale přitom můžeme za jedno kolo (deset sekund) zaútočit jednou.
Ve všech našich chlapsky romantických představách proklaje udatný ochránce slabších tři nenapravitelné záporáky během chviličky, kdežto při hře si hodíme každé kolo jednou na *Boj*, když máme štěstí tak jednou na útok (protože když na nás záporák [zaútočí první a my se mu radši bráníme zbraní, tak ten útok ztratíme](https://pph.drdplus.info/#volba_obrany_proti_utoku_zblizka)) a pak jednou na obranu. Toť vše, nic moc.

A tak jsme začali špekulovat, jak tohle naroubovat na *Boj*. A pak nás místo šlaku trefil blesk z čistého nebe a pravil, “žádné roubování, *Boj* je rychlost akce, čím víc *Boje*, tím víc akcí”.
A tak začal závod v nápadech a otázkách.

- kolik bodů *Boje* “stojí” jedna akce?
  - a každá akce "stojí" stejně?
- kolik bodů *Boje* vlastně průměrná postava má každé kolo k dispozici?

Nakonec jsme se odpíchli od toho posledního, *kolik Bodů boje máme k dispozici*.

On je ten náš svět docela jednoduchý (popravdě každý svět):

- chceš kombinovat? -> a co jako? -> akce v boji jo? -> a znáš své možnosti? -> že bude seznam akcí a jejich cena v bodech *Boje* jo? -> a jaký je **zdroj** těch bodů *Boje*?

Aha, takže nejdřív potřebujeme znát **zdroj**, tedy odkud se *Boj* bere, potom teprve se můžeme bavit o akcích a jaká bude cena akcí a teprve poté má smysl řešit jejich kombinace.

> život na Zemi taky nejdříve potřeboval zjistit, že existují **zdroje** jako světlo, voda, uhlík, dusík a další prvky, aby díky tomu našel své **možnosti** v buňkách, aby jejich kombinacemi stvořil fotosyntézu, okysličenou krev, létání a tohle mohl **kombinovat**

 - ptáka s fotosyntézou sice neznáme, ale takový lenochod si pěstuje v kožichu mech, aby ho ze sebe mohl vyčesávat a jíst, prostě fotosyntézový borec!


### Zdroj Boje
> Kolik Boje dostanu?

Když si vezmeme původní pravidla, tak body *Boje* ovlivňují nějaké ty základní vlastnosti, k tomu hod 2k6+ a pak spousta úprav jako dovednost se zbraní, únava a zranění, terén a tak.

 - průměrný nýmand z Horní dolní má postih -3 k *Boji* za to, že vidlemi bodnul nanejvýš tak kunu a pak co mu padne na kostkách, takže má rozptyl *Boje* mezi -1 až +9, když nepočítáme krajní případy
  - jak tímhle má platit nějakou akci?

S tak velkým rozptylem by nám měla pomoci pandemie jménem *Magická šestka*, která má za úkol co nejvíce mechanik převést na číslo **šest**, pokud to dává smysl a *hod na Boj* chceme v rámci ní převést na 1k6+-.

### Magická šestka
> Rozptyl 2k6+- je moc velký, snižme ho na 1k6+-

**Šestka** má už teď v DrD+ velkou roli:

- šestistěnná kostka (skláním se před vlivem *Člověče, nezlob se*, které nám tenhle standard zavedlo v domácnostech)
- [bonus o šest vyšší znamená dvojnásobek a o šest menší polovičku](https://pph.drdplus.info/#scitani_a_odcitani)
- zatraceně [mizerný úlovek](https://pph.drdplus.info/#tabulka_ulovku) dává postih k odpočinku -6 (ne, to ještě není schválená změna),
- *Boj* -6 je nyní nejmenší možný *Boj*, se kterým ještě mohu bojovat v tomto kole (možná je to naše domácí pravidlo, v oficiální příručce jsem to teď nenašel)


Fajn, takže průměrný nýmand z Horní dolní už nemá rozptyl *Boje* mezi -1 až -9, ale -2 až 3 (opět bez krajních případů).
Hmm, to jsme si pomohli, co s tím mínusem? Když *chceme co se dá převést na šestky*, tak by se nabízelo *chtít za každou velkou akci šest bodů Boje* (za útok, obranu se zbraní, útěk a pronásledování, kouzlení), jenže tenhle vidlák by dělal stěží figuranta. Něco tu smrdí…

#### Zjednodušme postihy v boji

> Boj musí být svižný

Když jsem si před lety psal poznámky k prvním nápadům na DrD+, jedna z vět zněla, že *Boj musí být svižný*, ale není.

Když neumíš se zbraní, tak máš jaké postihy? Víš to z hlavy? Já teda ne. Už jsme o tom přemýšleli a vypadlo nám z toho, že na začátku jsi **nula** a proto budeš mít všechno na nule a teprve s přibývajícími dovednostmi ti budou **přibývat bonusy**.
Za každý jeden stupeň [dovednosti Boje s typem zbraně](https://pph.drdplus.info/#boj_se_zbrani) pěkně bonus +1 ke všemu bojovému, tedy +1 k *Boji*, +1 k *Útoku*, +1 k *Obraně* a nazdar.

Fajn, takže náš nýmand má *Boj* nula, jo, to jsme se fakt hnuli…

#### Každý účastník boje má aspoň jednu akci

> Potřebujeme základní zdroj Boje

A tak jsme se dostali k tomu, že každý účastník boje **dostane** na začátku každého kola *Boj* +6 k tomu, co hodí na kostce a najednou je z toho jedna až dvě akce (každá stojí 6 bodů *Boje*, když hodím na kostce 6, mám 12 bodů *Boje*). To už by šlo.

Tenhle základ se nám líbí, ale vyvstaly tím nové otázky.


#### Kombinace jsou základ boje
> Jak zařídit, aby každý mohl v boji něco dělat?

Usadili jsme se v myšlence, že každé kolo bude mít bojující *Boj* 6 + další úpravy, což ve většině případů dá jednu až dvě akce.

Jenže krom bonusů jsou tu stále i postihy. Postih za nedostatečnou sílu (kterou chceme zjednodušit na -1 ke všemu k boji za každý chybějící bod síly), postih za únavu a zranění a určitě by se ještě něco našlo.

- takže když mám menší *Boj* než 6, nemůžu dělat **nic**?

#### Kolik stojí akce

> Dělej si co chceš, když na to máš

Potřebovali jsme jednoduché pravidlo, které zaškatulkuje akce do “ceníku" boje, protože dříve nebo později se hráči dostanou k akci, kterou pravidla **nepopisují** a oni pak budou dumat, kolik času a energie, tedy kolik bodů *Boje* by taková akce měla zabrat.
U toho jsme vyšli z původního [rozdělení činností](https://pph.drdplus.info/#cinnosti_a_koncentrace) podle duševní náročnosti na automatické, s volným soustředěním, plným soustředěním a transem (a tohle rozdělení zachováme).

- [trans](https://pph.drdplus.info/#trans) zabere celé kolo, pokud není výslovně uvedeno jinak
  - ale těžko se nám vymýšlí příklad, kdy by měla činnost podobná transu trvat kratší dobu než celé kolo, leda snad nějaké chvilkové mdloby…
- činnost [s plným soustředěním](https://pph.drdplus.info/#plne_soustredeni) zabere 6 bodů *Boje*
  - útok
  - obrana se zbraní či štítem
  - útěk
  - pronásledování
  - poctivé přezbrojení (s uklizením původní zbraně na snadno dostupné místo a připravení nové)
  - vytažení předmětu zahrabaného v batohu
- činnost [s volným soustředěním](https://pph.drdplus.info/#volne_soustredeni) zabere 3 body *Boje*
  - mluvení
  - rychlé přezbrojení (zahození původní zbraně a připravení nové)
  - vytažení předmětu z kapsy
- [automatická činnost](https://pph.drdplus.info/#automaticka_cinnost) nezabere nic
  - obrana uhýbáním
  - výkřik strachu
  - přivření očí při záblesku

Všimni si, že obranu uhnutím, tedy bez použití zbraně či štítu, můžeš provést v našem návrhu kdykoli, dokonce i když už ti žádné body *Boje* nezbyly. Počítáme ji totiž do běžného pohybu na bojišti a dáváme tak možnost bránit se komukoli kdykoli.
  
  - přestože obrana uhýbáním nestojí v základu žádné body *Boje*, tak se na ní stále můžeš více soustředit a použít pro ni nějaké ty body *Boje*, abys získal bonus k *Obraně*
  - tím samozřejmě vyskakují čertíci typu “zloděj všechen *Boj* nacpe do útoku a obranu vyřeší uhýbáním”, ale to jsou provozní problémy, které nás nezastraší a které budeme řešit později

### Boj už není jen o rychlosti první akce
> A kde je ta náhoda?

Z poněkud neprůhledného čísla *Boj*, které přidávalo nové možnosti (finty) pouze několika málo vyvoleným a ostatním jen povinnost čekat na ty rychlejší, jsme udělali obecný zdroj, který potřebuje pro své akce **každý**.

A najednou je na obtíž na prvotní změna, že na *Boj* se bude házet jen jednou na začátku souboje. Najednou jiný *Boj* nemíchá jen pořadím a nepřepíná tupě mezi stavy "teď můžu beztrestně útočit" a "jestli se budu bránit zbraní, přijdu o ten jeden jediný útok, to jediné co můžu tohle kolo souboje efektivně udělat", ale dává nám možnost **více akcí za kolo**, určuje, zda můžu v boji provádět další kulišárny a tudíž různé body *Boje* na začátku kola můžou pěkně zamíchat s akcemi, které se tohle kolo budou dít.
*Hod na Boj* každé kolo zase dostal smysl a můžeme si škrtnout, že"

- ~~každé kolo se mi *Boj* resetuje na hodnotu v prvním kole~~

## Další kombinace
> Zdroj máme, základní možnosti máme, tak přidejme další možnosti, ať se nám hezky kombinuje

Jelikož jsme *Boj* konečně identifikovali a víme, že je to vlastně **čas**, ve kterém můžeme něco provádět, tak si teď můžeme hrát s časem:

 - něco lze určitě udělat **rychleji**
   - sice nebude výsledek tak dobrý, ale někdy je rychlost důležitější
 - něco lze určitě udělat **poctivěji**
   - sice nad tím strávíme více času, ale za to bude výsledek výstavnější

Takže když mám dejme tomu deset bodů *Boje*, tak bych mohl šest bodů *Boje* použít na útok a zbylé tři body *Boje* na odfláknutější obranu.

  - za každý jeden chybějící bod *Boje* budu mít postih -1 ke **všemu**, co v danou chvíli dělám
    - v našem příkladu jsem na obranu použil namísto **potřebných** šesti bodů *Boje* pouze čtyři, tak mám postih -2 ke **všemu**, co v téhle akci provádím, včetně například obrany

A obráceně bych se mohl rozhodnout, že obranu nepotřebuji, takže se vrhnu po hlavě do útoku, k šesti bodům *Boje* potřebným pro útok přidám čtyři další a hned zatlačuji nepřítele do kouta.

  - za každý bod *Boje* navíc dostanu bonus k právě prováděné akci +1, takže za čtyři body *Boje* navíc dostanu +4 body ke **všemu**, co zrovna provádím, včetně například útoku
    - ono to nezní špatně, ale protože jsem na útok spotřeboval všechny body *Boje*, tak druhá akce, byť i tak zbrklejší, se mi smrskla na něco s postihem -6

### Nekonečný počet akcí
> Každý systém má díru

Tím jsme se dostali k vykukům, kteří by chtěli útočit s postihem -6, tedy že by nezaplatili **žádný** *Boj* a mohli by tak útočit do nekonečna.

První návrh na řešení takové situace byla povinnost použít na každou akci alespoň jeden bod *Boje*. Trvalo to asi deset minut, než z nadšení nad řešením zbyla frustrace z pokračování problému.
Ti samí vykukové by samozřejmě použili na každou akci jen jeden bod *Boje*, takže když mají *Boj* deset, tak by mohli provést deset akcí.

Přišlo nám to ještě chvíli dobré, protože tím by vznikly herní situace, kdy hostinský zurřivě buší do ožraly v touze vymlátit z něj alespoň část útraty, zatímco ožrala analyzuje, zda jde o komára či jiný bodavý hmyz (vzhledem k velkému postihu hostinského na útok), ale pak začaly vyskakovat jak houby po dešti situace, kdy se tohle dá zneužít a navíc by to **hodně zdržovalo** ostatní hráče.

### Nekonečná velikost akce

Už jsme to trochu nastínili v příklaech, ve kterých přidáváme a ubíráme **nanejvýš šest** bodů *Boje*. Plus šest je dvojnásobek, mínus šest je polovička a více s body *Boje* operovat nemůžeš.

- akce, ze které zcela odčerpáš body *Boje* (všech šest), tak **nezmizí**, ale budeš k ní mít postih -6

A proč zrovna šest? Protože šest bodů *Boje* stojí jedna akce. A co akce s *volným soustředěním*, které stojí tři body *Boje*? Aha, ta to bude chcít ještě ujasnit tyhle akce.

#### Od přírody malé akce
Akce vyžadující *plné soustředění*, jako je útok, obrana, kouzlení a podobně, potřebují pro kvalitní výsledek šest bodů *Boje*. Akce s *volným soustředěním*, jako je běžná mluva, přezbrojování a vůbec vyndavání známých předmětů z dostupných míst (nikoli dna batohu), vyžadují pro kvalitní provedení tři body *Boje*.

Otázka zní, jestli akce s *volným soustředením*, tedy taková ta "malá akce", spotřebuje skutečně jednu **akci**.
Je to hra s čísly, takže vytáhneme příklad a čísla:

- na *Boj* mám celkem devět bodů *Boje*
- to jsou dvě "velké" akce
- jedna "velká" akce běžně potřebuje šest bodů *Boje*, pak už ji provádím s postihem
- jedna "malá" akce běžně potřebuje tři body *Boje*, pak už ji provádím s postihem
- pokud se rozhodnu provádět s těmi devíti body *Boje* pouze malé akce...
  - tak mám místo dvou "velkých" akcí čtyři "malé" akce, nebo zase jen dvě, byť s velkým přebytkem bodů *Boje*?

Akce s volným soustředěním nemusí trvat zákonitě kratší dobu než akce s plným soustředěním, jenom je na ně potřeba méně duševní energie. Takže do jednoho kola, do deseti sekund, jich nenacpu více, ale můžu k nim provádět *zároveň* ještě něco jiného.

- za kolo boje stihnu stejný počet akcí vyžadujících *plné soustředění* jako akcí vyžadujících *volné soustředění*
- v čase jedné "velké" akce stihnu dvě "malé" akce
- v čase jedné "velké" akce stihnu dvě "malé" akce

To poslední je záludné a ještě to budeme testovat, ale zatím to máme vymyšleno tak, že pokud mám na začátku kola třeba devět bodů *Boje*, tak mám dvě nějaké akce a tyto akce buďto provedu za sebou a nebo, pokud jsou obě s *volným soustředěním*, tak je mohu provést i **zároveň**, naráz, v jedné a té samé *vlně akcí*.

Poznámka: v současných pravidlech se uvádí, že když provádíš dvě akce s *volným soustředěním* zároveň, tak k nim máš [postih -3](https://pph.drdplus.info/?version=master#volne_soustredeni). To s novými pravidly o bodech *Boje* odpadá, pokud na dvě akce s volným soustředěním body *Boje* máš, tak se žádný postih nekoná.

### Počet akcí je znám hned
> Co sis hodil, to máš

Jak už to bývá, to nejjednodušší řešení je to nejlepší. Když většina akcí stojí **šest** bodů *Boje* a ty kratší jsou spíše doplňkové (mluvení, tahání králíků z kapes), tak máš **tolik akcí, kolik ti body *Boje* dovolí**. Když máš *Boj* sedm, tak můžeš provést dvě akce (6 + 1). A dost. Klidně si pak hraj s body *Boje*, přelévej je sem a tam mezi akcemi, ale více než dvě akce už z toho nevykřešeš.

  - situace typu *"I přes bitevní vřavu budu hulákat na bandity, v jaké že jsou bezvýchodné situaci a z kapsy zatím vytáhnu bouchací kapsli"*, což bude chtít dvě tříbodové akce (protože to jsou dvě akce s *volným soustředením*), necháme na Pánu jeskyně, který jistě moudře rozhodne, že tím se vyplní jedna *běžně velká* akce za šest bodů *Boje* a nechá hrdinu zakončit svůj mocný projev prásknutím kapsle, aniž by za to vyžadoval další body *Boje* či více akcí.

### Boj je časová osa
> Až to přijde, tak to přijde

Jelikož jsme byli s posledním návrhem *Boje* a počtem akcí i po několika dalších debatách spokojeni, zaměřili jsme se na další otázku:

 * jak je to s pořadím akcí, když si zpřeházím body *Boje*?

Už na začátku návrhu nám došlo, že *Boj* je vlastně **čas**. Jedno kolo bojování trvá deset sekund (což měnit nechceme) a do nich se má vměstnat tolik akcí, kolik si hráči a Pán jeskyně z bodů *Boje* obhájí.
Pokud má ten nejrychlejší s nejrychlejších *Boj* 17, tak se dá udělat čára, která začíná nulou, končí sedmnáctkou, a celé je to ještě rozdělené ná úseky po šesti, takže je vidět, že nejrychlejší borec má *sedmnáct, (17-6=) jedenáct, (11-6=) pět*, to jest tři akce a tu poslední trochu uspěchanější. Ostatní postavy budou načmárané někde mezi tím, občas se jim začátky akcí potkají, většinou minou.

Pro základní přehled, kdo je jak rychlý, tak dobrý, i když je toho malování nějak moc.
Jenže když si ten nejrychlější hráč přelije *Boj* z poslední akce do první, takže tu první nafoukne na dvojnásobek a poslední zmizí a teď co. Bude jeho první akce pořád první?

### Časová hranice akce
> Něco končí, něco začíná

*Boj* je **čas** a akce můžeš dělat pomaleji nebo rychleji, podle toho, jestli spotřebuješ více nebo méně *Boje*, tedy času.
> Čas sám tím ale ani nezpomalíš, ani nezrychlíš, ten si plyne pořád stejně.

Takže když se první hráč rozhodne svou poslední akci obětovat a čas z ní použít na tu první, tak tu první provádí dvakrát **pomaleji** a tudíž jí i dokončí až za dvojnásobnou dobu, takže sice svou akci začne jako první, ale její výsledek, její efekt přijde až mnohem později.
A co nás zajímá více, jestli se na mě někdo zle podíval a já vím, že mi půjde po krku, nebo že už mě konečně nachytal na holičkách a pronikl mou důmyslnou obranou, takže mám monokl jak státní úředník? Zajímá nás, kdy přijde **výsledek**.
A co když stojím proti čarodějovi, který zrovna začíná kouzlit? Mám čekat, až z něj vyletí ohnivá koule a pak ho teprve citlivě vyrušit štítem do obličeje? Hmm, tady nás zajimá, kdy akce **začíná**.

Výsledek útočné akce se dostaví **někdy** během celé akce, podle toho, jak se zrovna sféry vyspaly. Když na útok spotřebuju půl kola, což je asi tak pět sekund, a protivníka **nezraním**, tak jsem ho pět sekund oťukával, obíhal, dělal na něj urážlivé posunky a nic z toho. Pokud jsem ho ale zranil, tak někdy během těch pěti sekund jsem se mu dostal na kobylku a praštil ho. Ale není v ničích silách předem určit, jestli to bylo na začátku akce, uprostřed, nebo někde na konci.

Zato když kouzlím a na kouzlení spotřebuji polovinu kola, tak vyvolat kouzlo opravdu trvá oněch pět sekund a terpve na jejich konci se kouzlo konečně plně projeví a **po celou tu dobu** mi může někdo dát bolestivou *stopku*.

Aha, takže kdo je nejrychlejší, ten si "odútočí" a "odkouzlí" to svoje, zatímco ostatní čekají poslušně na výsledek a pak zas dostanou štafetu akcí oni? Má dáti, dal? Něco tady smrdí.

### Boj je chaos se záblesky výsledků

Útok není o postávání v koutě a "až na mě přijde řada, tak jednou uděřím", jak je to bohužel vidět v některých počítačových hrách, ale o intenzivním oťukávání nepřítele a hledáním slabého místa či chyby.
Účastníci boje se tu řežou hlava nehlava, tu zas kolem sebe jen krouží, plivají po sobě, šklebí se, uskakují, obíhají nepozorné a pomalé, schovávají se za společníky, prchají aby zas skočili do boje z jiné strany a vůbec je to zmatek, ve kterém je nějaká časová osa spíše zbožné přání, než zákon.
Ony totiž ty akce dost často **začínají** ve stejný čas

  - zatímco dotírám na skřetího kuchaře, považujícího ho za šéfa celé bandy, tak v tu **samou** dobu odrážím útoky jejich stopaře a body *Boje* pouze udávají, komu se povede výsledek dříve

Proto by si klidně všichni útočníci mohli hodit na útok bez nějakého pořadí, obránci by si mohli hodit proti nim na obranu a pokud nikdo není zasažen, vůbec by se nějaké **pořadí nemuselo řešit**.

Pořadí začne mít vliv **až** když

  - akce byla úspěšná
  - výsledek akce něco ovlivnil
  - vliv akce se projeví ještě v tomto kole

Tu složitost s pořadím nám tedy přináší až ten poslední bod - takové vlivy, které se projeví ještě v **tomto** kole, ty ostatní se prostě vyřešní **v klidu** až na konci kola.

### Vlivy v tomto kole
> Jak rychlý je okamžik?

Pokud budeme přemýšlet o jednom kole boje jako o deseti sekundách, u kterých si dokážeme představit, že se během nich stalo spoustu věcí a pokud budeme těch deset sekund ještě drobit na jednotlivé dílky podle bodů *Boje*, tak se zavřeme do simulátoru atomových hodin, kde **všechno jde za sebou** a nic se nestane zároveň.
Ono to zní úžasně reálně, ale pouze dokud neopustíme laboratoře Teoretik s.r.o. a nevyzkoušíme si to na vlastní kůži:

  - spoustu opravdových zranění (ne ty odřená kolena, u kterých jsme se naučili v dětství fňukat) si uvědomíme až po nějaké chvíli, stejně jako když sražená srnka ještě stihne odběhnout na pole, kde teprve padne
  - spousta z nás své předpoklady opírá o *dřevárny*, kde se zásah počítá okamžitě
    - ale když se pak porveme o holku, tak jde hlášení zásahů stranou
  - boj je naprostý zmatek a tvrdit s určitostí, že blesk zabil bojovníka těsně před dopadem jeho meče lze pouze na základě zpětného rozboru videzáznamu, který do DrD+ zavádět nehodláme

Dostáváme se k tomu, že onen dokonalý nápad `Boj = čas`, respektive že to jsou *jednotlivé, velmi přesné časové dílky desetisekundového kola*, je krátkozraká hloupost.

- ~~*Boj* = posloupnost času~~

Tak, a teď co s tím?

#### Kdy je teď?

Od začátku víme, že *Boj* určuje *rychlost akce*, kdo má větší *Boj*, je rychlejší. Fajn. Takže to zkusíme tak, že kdo má vyšší *Boj*, provede **všechny** své akce jako první, po něm **všechny** ten druhý, po něm **všechny** ten třetí a tak dále. Pokud je mezitím ten další vyřazen, už se ke svým akcím nedostane.
Takže jsme udrželi smysl *Boje* jako rychlosti reakce a z jednoho účastníka boje jsme udělali chrliče akcí, zatímco ostatní hráči se budou dloubat v nose a **čekat** *co na ně zbyde*. To smrdí nudou a zklamáním.

A co když ten původní smysl *Boje*, tu rychlost reakcí zahodíme? Co když zůstaneme jen u toho, že *Boj* určuje **počet** akcí a hotovo?
Hráči mohou dělat své akce **bez čekání** na ostatní a i kdyby jeden z nich během současného kola padnul, ještě pořád všechny své pečlivě naplánované akce dokončí (což samozřejmě platí i o nepřátelích).
Pokud bychom se rozhodli, že nejmenší časový úsek, ve kterém má smysl vnímat bitvu, je jedno kolo, tak se nám život dost zjednoduší a vypadá to, že boj tak bude i zábavnější.

  - takže zkusíme boj, ve kterém se **všechny** efekty projeví až na **konci** kola, ať už je to zranění, útěk, paralýza či zastrašení nepřítele

S touhle myšlenkou nám pomohla [poznámka ShadoWWWa na RPG fóru](https://rpgforum.cz/forum/viewtopic.php?f=238&t=15032&start=30#p539414), který zmiňuje, že *realističnost* a *uvěřitelnost* **není** to samé. A pak je tu samozřejmě hratelnost, nebo-li **zábava**, která hrou vznikne. A jestli něco dokáže zábavu spolehlivě zabít, tak je to čekání.
A čekat, až na mě přijde řada a ještě k tomu se dočkat toho, že moje ukrutně promyšlená akce už nemá smysl, protože někdo hodil na kostce víc a ještě k tomu nemám možnost svou akci změnit změnit, to je k vzteku.

#### Výsledky až konec, ale čeho?

No, tak jsme si vyzkoušeli boj, ve kterém se vešekeré výsledky projeví až na konci kola a je to takové... zajímavé. Když mají všichni málo akcí, tak je to dobré, ale jakmile má někdo citelně víc akcí, nwž ostatní, začíná dostávat na frak právě *uvěřitelnost*.

On když někdo má čtyři akce za kolo, například ninja chroupající zrnka kávy a proti němu stojí tři gardisté-brigádníci, kteří na *kurzu sebeobrany s tou špičatou věcí* nedávali pozor, tak ninja po zásahu každého gardisty bude muset vyčkat až na konec kola, zda rána gardistu položila nebo ne a pokud nutně potřebuje dostat gardisty na lopatky v co nekratším čase, tak se bude muset řídit jen svým citem, dva gardisty kopnout jednou, jednoho dvakrát a pak čekat na konec kola, zda padnou k zemi všchni.
A je tu i komplikace pro hráče, kteří bojují a škrtají si životy a zapisují si že jim hoří zadnice a... najednou je konec kola, čas se zastaví a každý začne teprve řešit dopad akce, o které se mluvilo klidně i před deseti minutama. Prostě nudná inventura. Sakra.

Takže nejdříve jsme zavrhli ~~řešení akcí **hned** jak se stanou~~  protože bychom museli řešit **přěesné** pořadí akcí každého účastníka boje, což je zdlouhavé a nudné.
A teď jsme i zavrhli ~~řešení akcí až na **konci kola**~~, protože už to může být příliš dlouho po té, co hráč akci zažil a zmizí tak napětí i kus uvěřitelnosti.

Takže co s tím?

  - zkusíme řešit výsledky akcí **na konci každé vlny akcí** (lepší slovo než *vlna* zatím nemáme)

Ninja, který chce skolit gardisty, jednoho z nich kopne a každý gardista po ninjovi máchne halapartnou, až na jednoho, který zpanikaří a zkouší utéct. Tím skončí první vlna akcí a vyhodnotí se. Ninja si proti každému útoku už házel na obranu (v jeho případě uhybáním), takže má zapsaná zranění (a skutečně ho dva strefili, byť jenom ratištěm) a ověří si, že žádný postih ze zranění nemá. Mezitím gardista, který chtěl utéct, zjišťuje, že sice vložil všech svých osm bodů *Boje* do útěku, ale ninja si vybral jako na potvoru právě jeho jako první cíl, takže se dopotácí na svých osm metrů, kde ho konečně naplno dožene bolest a zásah do hlavy a v cílové rovince padne. Ninja má ještě tři akce a proti němu stojí dva gardisté, kteří po pádu kolegy svorně obětují druhý útok raději na obranu.

### Povinnost hlášení akcí
> Žalovat se nemá, ale hlásit se to musí!

Když chci provést akci, která ovlivňuje ostatní, **musím** ji nahlásit na začátku kola. V průběhu kola už můžu provést jen spontální, *instinktivní* akce, což jsou v naprosté většině jen ty, které se týkají přímo mě.
Předem nahlášené akce můžu **kdykoli** vyměnit za *instinktivní*, ale nemůžu už měnit předem zvolený **poměr** *Boje* ("velikost" akce, přelévání bodů *Boje*).

   - pokud jsi měl *Boj* sedm, pět bodů *Boje* ses rozhodl použít na útok a tři na svou obranu, můžeš klidně uprostřed boje oznámit, že svou akci útok rušíš (pokud jsi ji samozřejmě ještě neprovedl), aby ses mohl **místo** něj bránit
     - na útok jsi použil pět bodů **Boje**, takže tvá obrana, za kterou jsi útok na poslední chvíli vyměnil, má zase sílu pět bodů *Boje*
         - může mít méně (i když nevím, proč bys to dělal), ale **nemůže** mít více ani nemůžeš body *Boje* ze zrušeného útoku napumpovat do **předem** hlášené obrany, protože to je **jiná** akce

#### Pětiletka
No, tak jsme si zkusili boj, ve kterém máme více akcí a **všechny** jsme nahlásili předem a nic moc. Samozřejmě že během boje se toho spoustu změnilo, hlavně proto, že jsme zrušili vyhodnocování akcí až na konci kola a zavedli jejich vyhodnocování na konci každé *vlny akcí*. Takže takhle ne, hlášení akcí je sice **důležitý** prvek hry, ale načasování musíme nastavit na začátku *vlny akcí*.

 - akci, která ovlivňuje ostatní, **musím** nahlásit na začátku ~~kola~~ *vlny akcí*
 
#### Instinktivní akce
Počítáme mezi ně

  - obrana sebe samého
  - útěk
  - mluvení a gestikulace "do větru", bez cíle
    - kouzlení **bez cíle** nebo na sebe sama sem také spadá

Některé akce si osvojíš jako *instinktivní* později, například bojovník dokáže instinktivně zareagovat na napadeného společníka a změnit svou akci na **jeho** obranu, přestože to běžný občan bez předchozího rozhodnutí **efektivně** nesvede (což neznamená, že by to nemohl zkusit a že Pán jeskyně sem tam nepřivře očko a za dobrý popis situace obětavé bránění kamaráda neuzná).
        
Z instinktivních akcí vyplývají dvě zajímavosti:

 - **jakoukoli** akci můžeš vyměnit na poslední chvíli na *instinktivní*, například na obranu sebe sama
   - *instinktivní* akce je jen taková, kterou si jako *instinktivní* obhájíš před ostatními
     - *instinktivní* je například obrana tou zbraní, kterou jsi chtěl použít k útoku, ale už ne přezbrojení na "lepší" na poslední chvíli
       - ovšem bojovníci specializovaní na obranu, zloději co zrovna nemají v ruce dýku a hraničáři, kteřím hrozí zničení luku, tohle zřejmě budou moci změnit

### Převodník akcí
> Co bylo, bylo

V [Pravidlech pro hráče](https://pph.drdplus.info/#dalsi_bojove_akce) jsou tyto zvláštní bojové akce, u kterých přemýšlíme o zrušení, protože je zvládneš přeléváním bodů *Boje*:

  - *[Bezhlavý útok](https://pph.drdplus.info/#bezhlavy_utok): +2 k Útočnému číslu, +2 k Základu zranění, -5 k obraně*
    - podobného výsledku dosáhneš, když ze své akce *Obrana* odebereš dva body *Boje* a máš tak postih -2 k obraně a tyto body *Boje* si přidáš k akci *Útok*, takže získáš bonus +2 k *Útoku*
      - poměr je nově výhodnější, což je schválně, protože postihování hráčů za to, že chtějí urychlit boj, nám vadil a zároveň je nyní snazší se bránit, když mohu kteroukoli akci zrušit a namísto ní ohlásit *Obranu*
      - poznámka: plánujeme sloučit *Útočné číslo* a *Základ zranění* do jednoho čísla (*Útok*), které prostě odečteš od *Obrany* a rozdíl budou **výsledná** zranění
        - například *Útok* 7 proti *Obraně* 6 znamená 1 bod *Zranění*
      - druhá poznámka: plánujeme sloučit *Obranné číslo* a *Ochranu zbroje* do jediného čísla *Obrana*
        - například *Obranost* +4 a pobíjená zbroj s *Ochranou zbroje* +3 dají *Obranu* 7
          - také už víme, že chybějící *Síla* bude rovnou výsledný postih k *Obraně* (respektive ke všemu), žádná tabulka, ale ještě nevíme, jestli dovednost [Nošení zbroje](https://pph.drdplus.info/#noseni_zbroje) bude snižovat postih, jakkoli to zní logicky, nebo zvyšovat bonus, podobně jako to bude u dovednosti [Boje se zbraní](https://pph.drdplus.info/#boj_se_zbrani))
  - *[Soustředení na obranu](https://pph.drdplus.info/#soustredeni_na_obranu): +2 k BČ a +2 k OČ, ale nemůžeš v tomto kole útočit*
    - tohle se dá řešit opět přeléváním bodů *Boje* a pokud tě útok nezajímá vůbec, tak prostě všechny body *Boje* použiješ na obranu
      - opakujeme, že **během** boje už nelze měnit **poměr** použitých bodů *Boje*, takže nemůžeš dodatečně oznámit, že ze dvou běžných útoků, na které jsi použil například šest a pět bodů *Boje*, uděláš jednu *skvělou* **instinktivní** obranu, na kterou bys použil jedenáct bodů *Boje*. Tyto dva útoky můžeš proměnit pouze ve dvě obrany, jednu s použitím šesti a druhou s pěti body *Boje*. Tu *skvělou* obranu bys musel ohlásit předem a to ještě proti konkrétnímu nepříteli
  - *[Krytí spolubojovníka](https://pph.drdplus.info/#kryti_spolubojovnika): ...Bohužel ochránce nemá v tomto kole možnost provést vlastní útok.*
    - vše zůstává stejné, **až na poslední větu**, že bys ty jakožto obětavý obránce ztratil útok
      - musíš prostě jen obětovat jednu ze svých akcí na obranu svého spolubojovníka a je samozřejmě na tobě, kolik bodů *Boje* na jeho obranu použiješ
    - tuto akci samozřejmě musíš ohlásit předem na začátku kola
      - tedy pokud nejsi bojovník s náležitou schopností, která z *Krytí spolubojovníka* dělá *instinktivní* akci
  - *[Mířená střelba](https://pph.drdplus.info/#mirena_strelba) - Za každé kolo míření s postihem −2 k BČ si přičte +1 k ÚČ. Celkově může postava mířením získat bonus +3 k ÚČ.*
    - kolik bodů *Boje* na střelbu použiješ, o tolik se ti *Útok* zvýší
    - nejdelší smyslupná doba míření se tím redukuje na jedno kolo, protože body *Boje* do dalšího kola **nepřecházejí** a mířit déle než deset sekund má smysl možná tak na nehybný terč, nikoli na objekt ve víru boje
    - poznámka: tohle může být ještě kámen úrazu, protože střelec se tímto může stát velmi nebezpečným (například v kombinaci s už tak velmi nebezpčenými steřleckými schopnostmi zloděje), bude to chtít **pořádně** otestovat
    
Nejsme si ještě úplně jisti, že rušení výše uvedených zvláštních akcí je nejlepší nápad, minimálně bude škoda těch dobrých názvů, které zlepšují popis boje.

#### Boj a pohyb
V originálním přehledu akcí jich ještě pár zbylo a některé z nich mají jedno společné, **pohyb**.
Jakmile se řekne *pohyb*, obvykle se k tomu začne přilepovat i *rychlost* pohybu. Jakmile začneme řešit rychlost pohybu v něčem tak složitém, zmatkovitém a náhodném, jako je boj, tak se dostaneme tam, kde jsme před chvílí byli s *Bojem* coby *přesnými časovými úseky*.
Přestože pravidla řeší [Rychlost](https://pph.drdplus.info/#rychlost) (coby kombinaci *Síly* a *Obratnosti*), tak v boji je tenhle údaj prakticky nepoužitelný, protože je to *stálá* rychlost ve víceméně *neměnném* prostředí, což se rozhodně nedá říct o boji, kde ti kdekdo chce podrazit nohy, bodnout tě do zad, vypálit do hruďi flek jak ze zapomenuté žehličky a tak všelijak podobně. Rychlost, tak jak je [uvedená v pravidlech pro hráče](https://pph.drdplus.info/#rychlost), se dá použít **až** když se vymaníš z boje (většina z nás tomu říká útěk, někteří třeba teleport).

Fajn, takže v boji se všichni pohybují... jak rychle vlastně? Podle okolností, podle toho, jak jim boj sedl, podle toho kolik do pohybu věnují energie, prostě podle *na pohyb použitých bodů Boje*.

- za každý bod *Boje* se můžeš posunout o jeden metr, aniž by ses vystavil nějakým útokům navíc, zhoršil si postavení či si jinak v boji přitížil
  - ještě přemýšlíme o různých *Úprcích*, *Pronásledování za každou cenu* a podobně, kdy na nějaké "zhoršení postavení" budeš kašlat
- jakmile jsi v boji, tak se **nepohybuješ svou Rychlostí**, takže když rozrazíš dveře a deset metrů za nimi bude stát čaroděj, tak se oba dostáváte do boje a budete se pohybovat jeden metr za kolo za každý bod *Boje*, který do pohybu dáte (čaroděj asi bude couvat, ty se budeš řítit vpřed, tedy samozřejmě pokud máš čím ho přetáhnout po papuli)
  - pokud se čarodějů a vůbec nepřátel s dalekým dosahem bojíš, tak je zkoušej *překvapit*
    
#### Překvapení
Pokud se ti podaří někoho překvapit, máš celé kolo pro sebe. Vážně? No, [podle původních pravidel ano](https://pph.drdplus.info/#prekvapeni), což je tak akorát, protože tím překvapený přijde o jednu akci (respektive se může pouze bránit tím, co má zrovna po ruce).
Jenže teď, když může mít útočník třeba tři útoky za kolo, tak například do tebe jakožto překvapeného by bušil hlava nehlava a ty bys jen čekal, až mu dojde dech.

Původní pravidla to myslela dobře, překvapení sebere překvapenému jeho akci krom sebeobrany, tedy cokoli, co není spontální, *instinktivní*. To už jsme tu měli, ne? Ale chce to dopilovat.
Jedna poctivá, pořádná akce zabere šest bodů *Boje*, takže pokud mi překvapení jednu takovou akci sebere, tak mám postih -6 k *Boji*. Zkusíme se teď zamyslet, jestli to bude stačit (tohle není školní příklad, kdy učitel chce zamyšlení od žáků a tlačí je do známého výsledku - když tyhle řádky píšu, tak to řešení opravdu neznám, prostě jen myslím nahlas).

Běžná životní situace by mohla být třeba:

Kluk právě přelezl k sousedovi na jablka a protože má dojem, že soused je pryč, chová se bezstarostně. V tom se soused vynoří zpoza kůlny, protože si kluka všiml už před chvílí a číhal tu na něj.
"A mám tě!" zahuláká sousedský sadař a vrhne se na mladíka, aby mu neutekl.

- zkušený bojovník si poklepe na čelo, proč ztrácel čas mluvením, zatímco velmi zkušený bojovník pokýve souhlasně hlavou, že bojový pokřik se sadaři povedl

Mladík je překvapený a vyděšený, má -6 k *Boji*.
  
- Pán jeskyně mu chce dát ještě postih za leknutí, pak ale nad tím moudře mávne rukou, protože tak alespoň může vyrušit postih sadaře (časovou ztrátu) za hulákání

Postarší sadař má celkem na *Boj* (třeba) sedm, mladík (třeba) devět, ale po započtení postihu -6 má mladík *Boj* jen tři.
 
- sadař ohlásí akci *Běžím ke klukovi, abych ho chytil* a kluk ohlásí akci *Zdrhám jak o život*. Sadař to má ke klukovi pět metrů a *Boj* má větší, takže má první akci, spotřebuje pět bodů *Boje* na pohyb a už je u kluka... tak počkat, řekli jsme si, že *Boj* **neurčuje** pořadí akcí a akce se vyhodnocují až na konci *vlny akcí*
- tak znova, sadař běží ke klukovi a obětuje pět bodů *Boje* na běh, aby se k nemu dostal. Kluk se v tu samou chvíli dá na útěk (no, řekněme, že o malilinkatou chvilku později, přeci jen je z toho paf, ale zas o dost svižněji, přeci jen je mladý) a věnuje tomu všechnu energii co má, tedy tři body *Boje*
- na konci této *vlny akcí* se tedy sadař příbližil ke klukovi o pět mětrů, kluk se o tři vzdálil a jsou od sebe dva metry, teď můžou přijít na řadu další akce
- kluk už je bez bodů *Boje*, zato sadař je při chuti a zbývá mu jeden bod *Boje*, který by nejradši použil na chycení výrostka pod krkem, ale ještě na něj nedosáhne, tak se narychlo rozhodne na něj znova zařvat "Amtě!", což zadrmolí, jak je udýchaný a už už cítí klukův krk v prstech (prostě použil na akci s *volným soustředěním* namísto potřebných tří bodů *Boje* jen jeden)
- v dalším kole už kluk *Boj* s přehledem vyhrává a zdrhá co mu síly stačí, k plotu to stihne s předstihem a sadaři tak unikne...
- dlužno dodat, že sadař si došel pro hochovu mamku, takže z toho nakonec beztak byl sekec mazec a kluk měl zas o důvod víc opustit rodné hnízdo a jít na zkušenou

#### Boj a délka zbraně
Pokud máš *Boj* devět a nebezpečný lučištník je od tebe devět metrů, tak ho tohle kolo neohrozíš, protože i když všechny své body *Boje* dáš do pohybu... tak počkat, ohrozíš, prostě nacpeš osm bodů *Boje* do pohybu v první akci a ve druhé ti zbyde jeden bod *Boje* na útok... takže lučistník je od tebe deset metrů... tak počkat, to nacpeš do pohybu v první akci všech devět bodů *Boje* a zbyde ti druhá akce, sice bez bodů *Boje*, ale pořád můžeš zaútočit s postihem -6... takže lučistník je od tebe jedenáct metrů, dostaneš se k němu až ke konci kola a i když mu budeš funět do obličeje, tak na útok už ti energie nezbyde.
Ovšem pokud máš v ruce třeba [dlouhou dýku](https://pph.drdplus.info/#tabulka_zbrani_jednorucni_zbrane) s délkou 1, tak... tak nic, protože to není délka v metrech, ale v "půlmetrech", takže ti dáme do ruky radši kopí s délkou čtyři, což jsou dva metry a najednou bys lučistníka po doběhnutí devíti metrů zase mohl poškádlit (z devíti metrů už se zbraní s dosahem dvou metrů dosáhneš na lučistníkův jedenáctý metr), byť s útokem -6, jelikož ti došly body *Boje*.

Tím jsme se dostali k délce zbraně, která podle původních pravidel přidává bonus k *Boji*. Inu, v původních pravidlech proč ne, útok máš stejně jeden za kolo, takže útočit budeš pouze tou zbraní, co jsi na začátku popadnul, ale s právě popsanými změnami? Klidně tři útoky za kolo a každý s jinou zbraní (no dobře, "klidně" úplně ne, ale útok první zbraní, přezbrojení, útok druhou zbraní, zahození zbraně a útok holou pěstí borci zvládají).
Navíc se délka zbraně jako bonus k *Boji* započítává dle původních pravidel vždy, i když je přílišná délka zbraně vlastně nevýhodná (v malých prostorách, když se nepřítel příliš "lepí" a podobně).
Proto chceme délku zbraně jako bonus k *Boji* **zrušit**, [délky zbraní](https://pph.drdplus.info/#tabulka_zbrani_jednorucni_zbrane) upravit na metry (prostě původní zmenšíme na polovic) a délku zbraně tak využiješ pouze při útoku, aby sis zvýšil dosah a **ušetřil** nějaké body *Boje*.

Zdánlině nám tohle *hapruje* u útočníků, kteří se ani **nehnou**, například voják s kopím by měl mít díky jeho délce výhodu proti jezdci s měčem, což ale popravdě má - jezdec totiž musí *spálit* body *Boje* na pohyb, na to aby se vůbec k vojákovi dostal, kdežto ten jen čeká a útok, obranu či dost možná oboje bude mít v plné síle (nehledě na finty, které se voják při výcviku s kopím naučil a kvůli kterým jezdec na konci kola dost možná zůstane s vyraženým dechem na zemi).

Hnidopišský příklad:

- jezdec zná rytmus boje, proto se zastaví od pěšáka s kopím přesně tři metry od něj, pěšák tak na něj zatím nedosáhne a jezdec spoléhá na to, že pěšák neopustí linii a nepohne se
- pak jezdec vyrazí, spotřebuje tři body *Boje* na pohyb a "čeká" na svou druhou akci (ve skutečnosti samozřejmě nečeká na nic, ale ta časová posloupnost tam je), tedy útok, do kterého hodlá napumpovat veškerou zbylou energii
- pěšák skutečně poctivě čeká ve své linii a protože je úplné nemehlo, tak nechá jezdce přijet až k sobě... no, budiž mu jeho bůh milostiv
- o kousek dál právě nastala stejná situace, tentokrát ale jezdec narazil, protože pěšák proti němu použil obecnou fintu *Střeh se zbraní*, kterou jsme ještě nevymysleli a nějak se nám to tu zamotalo...

### Rozmotávání a Střeh se zbraní
Tak nějak jsem měl u předchozích řádek pocit, že mám v hlavě zasunuté prosté řešení nájezdníka na koni a pěšáka s dlouhým kopím v ruce, ale psal jsem a psal jsem a nic, vypadla ze mě jen finta *Střeh se zbraní*.
Nejdřív si shrnu, co že jsem si to předtím myslel:

- měl jsem dojem, že že práce s body Boje tak nějak sama vyřeší **všechny** situace podobné nájezdníkovi a pěšákovi
  - i když z části se tak stalo, protože kdy se asi tak stane, že bude mít jezdec čas si odkrokovat vzdálenost k pěšákovi, aby mu to *pěkně vyšlo* na nájezd
- v hlavě mám hlavně scénu ze Statečného srdce, což je samozřejmě filmová scéna, ale zase dost uvěřitelná, kdy pěšáci dlouhou dobu čekají a dělají bezbrané a teprve v posledních okamžicích zvednou ze země skrytá kopí a nadělají paseku v řadách překvapených rytířů na koních

Vlastně se pořád točím kolem té původní myšlenky, která je v pravidlech pro hráče, že délka zbraně dává prostou výhodu v dřívějším zásahu a které tak trochu věřím a zároveň cítím, že je to ve většině případů blbost.
Takže, kdy to blbost není? Na rytířském turnaji, kdy se proti sobě řítí dva jezdi se dřevci, namířenými přesně proti sobě, kdy ani jeden neuhne z rány a kdyby měl některý dřevec delší, tak určitě zasáhne protivníka dříve. A pak třeba v úzké chodbě, kdy protivník prostě nemá kam uhnout a musí projít přes onu dlouho zbraň.
A kdy to blbost je? V těch případech, kdy **je** kam uhnout, kdy se bojuje více pohybem, než statickými údery, což je **naprostá** většina boje.
Takže dávát někomu bonus za dlouhou zbraň má smysl jen v těch několika málo situacích, kdy protivník vyloženě leze do rány. A to je i případ scény ze Statečného srdce, kdy si jezdci jedou pro zásah, protože už jsou prostě tak moc rozjetí a tak nahuštění, že nemají čas a prostor na manévrování a my takovou scénu můžeme prostě a jednoduše vyřešit postihem k Boji za **překvapení**.

Takže co nám zbylo? ~~Bonus k Boji za délku zbraně~~ rušíme a opět se dostáváme k tomu, že délku zbraně má cenu řešit jen v případě, kdy potřebujeme zjistit *dosah* zbraně, tedy jestli na cíl dosáhneš.

A co ten *Střeh se zbraní*? No, na začátku jsem měl pocit, že tahle finta nám zachrání zadek a vrátí zpět uvěřitelnost scénám jako vystřižených ze Statečného srdce, ale dopadlo to lépe, *Střeh se zbraní* není potřeba, tak na něj zatím kašleme.

### Příliš dlouhá zbraň
Když už jsme u té délky zbraně, tak se nabízí ještě jeden problém k vyřešení. Co když mám příliš dlouhou zbraň? Co když jsem ponocný s halapartnou a lepí se na mě kurtyzána, ze které se záhy vyklube psychopatická vražedkyně s oblibou útočící perořízkem?

Nabízí se několik řešení:

- neřešit to
- vyžadovat po útočníkovi s příliš dlouhou zbraní, aby ustoupil do použitelné vzdálenosti
  - jenže pohyb je akce a když ustoupí, tak už zas nebude mít akci na útok...
  - může samozřejmě přezbrojit, nejsnáze zahozením současné zbraně a použitím pěstí (nebo nohou, to pak nemusí zahazovat nic)

Neřešit to můžeme kdykoli, teď se zkusíme zaměřit na tu druhou možnost, na povinný pohyb nebo přezbrojění na vhodnější zbraň.
Přijde mi to jako pěkné zpestření boje, kdy se například zlodějové budou snažit dostat doslova na tělo svým protivníkům.

 - hrozí ale, že hra bude nutit hráče používat krátké a ještě kratší zbraně, aby jim pořád někdo nestál před nosem

Také záložní možnost *přezbrojit na vhodnější zbraň*, což může být často zahození současné zbraně a použití pěstí, nebo třeba použítí kopí jako hole, či odkopnutí protivníka, mi přijdou jako zajíémavé koření boje.

- nebezpečí hrozí, že se z toho stane rutina a namísto boje budeme hrát kopanou

To si žádá **testy**.

## Různý základ boje pro různá povolání
> Každá odlišnost má stejný základ

V Pravidlech pro hráče je pro [každé povolání jiný výpočet Boje](http://pph.drdplus.loc:88/#tabulka_boje).
Za léta hraní *DrD Plus* jsme si už dávno ty rozdílné výpočty ospravedlnili a vysvětlili, je přeci nad slunce jasné, že zloděj bude do každého svého pohybu vkládat své znalosti úskoků a podrazů, čaroděj do všeho půjde hlavou, kněz bude šířit auru svého přesvědčení a neoblomnosti a bojovník... ten to prostě vyřeší instinkty. A navíc, i když popravdě spíše *a hlavně*, to dává každému povolání přibližně stejné šance, stejnou velikost *Boje*.

Nad tím se nyní snáší velké, temné **ale**.

Takže čaroděj má stejnou šanci, že stihne seslat kouzlo, jako bojovník, že stihne máchnout mečem, zloděj, že stihne bodnout do ledvin, hraničář, že stihne zastřelit vše živé v okruhu deseti mil, theurg, že stihne rozhodit ruce a tím rozhodit nepřátele ohnivou koulí a kněz že... že... stihne spočítat své ovečky. V souboji jeden na jednoho, kdy oba soupeři používají **pouze** své speciální schopnosti, tak dobrý. Jenže pak vezme čaroděj do ruky kuši, bojovník svitek a vůbec začnou dělat něco mimo jejich specializaci a najednou ten základ *Boje* není tak samozřejmý. Nebo snad čaroděj promýšlí každou svou akci tak do hloubky, že jeho inteligence *stíhá* poziitvně ovlivňovat jeho pohyby? Bojovník dokáže svitek použít stejně rychle a přirozeně, jako své dvoubřité metrové holítko?
A co teprve připravované kombinace povolání, co takový dobrodruh s čarodějem na třetí úrovni a zlodějem na čtvrté? To bude mít základ Boje `((Int x 3 + Zrč x 4) / 7 + Obr) / 2` ? No, jestli chcete *DrD Plus Plus*, tak proč ne, ale my to nechceme, my chceme *DrD Plus Mínus*.

Než začneme střílet nápady od boku jak *Lucky Luke*, tak se zamyslíme, k čemu ten základní *Boj* v původních pravidlech vlastně je: aby zkušenější dobrodruh mohl provést akci *dříve*, než nezkušený.
A teď si zopakujeme, na co jsme v těch předchozích dlouhých řádcích už přišli: *Boj* už neurčuje pořadí akcí, pouze jejich počet.
Takže původní potřeba, tedy rychlejší akce a tím dřívější efekt, odpadá a namísto ní je nová, byť obdobná - jak se bude zvyšovat počet akcí zkušeného dobrodruha a jestli vůbec.

Začneme tím, jestli vůbec by se měl zvyšovat počet akcí s rostoucími zkušenostmi a základními vlastnostmi (Obratnost, Inteligennce...). Pokud se podívám na jeden z mála dostupných zdrojů skutečného boje v současnosti, což je bojový sport, třeba kickbox, tak mám zatraceně silý pocit, že i kdyby do ringu vlezl mistr světa ve skosku dalekém, který je na tom fyzicky určitě dobře, tak ho během pár chvil skolí průměrný kickboxer, protože prostě ví jak na to. A pokud proti sobě stojí unavený a odpočatý kickboxer, nebo zkušený a začátečník, tak je jasně vidět i převaha v počtu akcí, kdy bojovník , který je ve výhodě, si může dovolit mnohem více útoků, parádiček, hledání slabých míst, prostě z toho mám silný dojem, že větší zkušenosti, nebo lepší stav těla i duše **zvyšují** body *Boje*. Takže počet akcí, respektive *Boj* by se zvyšovat měl (nehledě na to, že to spousta hráčů ve své honbě za božstvím očekává).

Fajn, a jak moc budeme *Boj* zvyšovat? A čím?
Už jsme nakousli, že chceme možnost více povolání pro jediného dobrodruha. Kněz šmrncnutý bojovníkem líznutý hraničářem, který začínal jako zloděj.

- uvažovali jsme o bonusu k *Boji* podle stylu zvoleného boje, kdo bude střílet, dostane bonus k *Boji* za *Zručnost*, kdo bude kouzlit, tak za *Inteligenci*, kdo útočit na blízko, tak za *Obratnost*
  - ono by to docela fungovalo, kdyby nebylo více akcí za kolo - když budu střílet, pak kouzlit a nakonec vyřeším situaci ručně, tak dostanu bonus k *Boji* za co?

*Boj* je číslo, které vyjadřuje orientaci v mumraji boje, vidění možností a energii, kterou dokážeme ty možnosti provést. Dává smysl, aby jedinec měl bonus za *Obratnost*, protože to je souhrn instinktů i schopnost těla reagovat. Dává smysl, aby jedinec měl bonus za *Inteligenci*, pokud ji *umí* **v boji** použít (což si koleduje o *Dovednost*, něco jako *Bojová taktika*). No jo, ale co ty různé style boje?

Dostanu bonus k *Boji*:

- za *Inteligenci*?
  - **ne**, jakkoli prudká inteligence přijde v bojové vřavě nazmar, protože její vlastník neví, jak ji bez tréninku využít
    - ale uvažujeme o dovednosti, která by umožnila *Inteligenci* v boji využít
- za *Obratnost*?
  - **ano**, je to souhrn instinktů, schopnost reagovat na nenadálé situace
- za *Zručnost*?
  - *ne*, přesnost pohybů rychlejší reakci nezajistí

Nabízí se oponentura, že střelec, který je přesnější v pohybech má větší šanci na zásah a může se tak dovolit vystřelit šíp dříve než nemehla. To je pravda, ale to už máme podchyceno výše v přelévání bodů *Boje*.
Kdo má vyšší *Zručnost*, má vyšší *Útok* a tím jistější šanci na zásah a může si tak spíše dovolit míření uspěchat (použije méně bodů *Boje* a bude tak mít postih k *Útoku*, ale zbyde mu víc energie na jiné akce).

## Velikost a vliv na boj

## Hra se skrytými akcemi
> Život bez překvapení je jako vtip bez pointy

Na začátku je dobré hlásit všechny akce všem, aby vám nový způsob boje přešel do krve.

Až se na to ale budete cítít, můžete si ale zkusit zajímavější formu hlášení akcí, skrytě. Pokud nejste sehraní bojovníci, nebo jste si prostě nedomluvili akce předem, tak můžete akce napsat na lístečky a položit je lícem dolů **před cíl** (akce se často opakují, takže za chvíli budeš mít balíček většiny akcí už připravený).
Tím budete tušit, kam kdo směřuje svou pozornost, ale budete se na vzájem překvapovat, co že to ten druhý zas vymyslel. Nehledě na Pána jeskyně, kterého by tak hra mohla více bavit, když už se nebude muset snažit tvářit, jako že o plánech družiny neví a že reaguje přirozeně.

## Shrnuntí

- na začátku boje mám *Boj* 6 + opravy (hlavně podle zbraně a použité vlastnosti) + 1k6+-
- ~~každé kolo se mi *Boj* resetuje na hodnotu v prvním kole~~
- každá akce, která vyžaduje *plné soustředění*, mě stojí 6 bodů *Boje*
    > sedlák Pecivál brání svačinu před liškou, má na *Boj* 6 + hodil 3 a svačinu brání hráběmi, se kterými umí sice dobře, ale ne bojovat, takže *Boj* = 9, na obranu spotřebuje 6 bodů *Boje*, na víc mu už nezbude (tři body mu propadnou, pokud je nevyužije na úpravu akce), oproti tomu zkušená liška má celkový *Boj* 13
    - akce s plným soustředěním jsou
        - útok
        - obrana zbraní či štítem
        - přezbrojení (tomu lze snadno snížit obtížnost připraveností, zkušenostmi a zahozením první zbraně, tedy jejím neuklízením)
        - vyjmutí předmětu z batohu (dej přednost selskému rozumu, pokud chceš vyndat kámen z volné kapsy, moc času ti to nezabere)
- obrana pouze uhýbáním (beze zbraně a bez štítu) žádný *Boj* nestojí, je to součást pohybu na bojišti
  - ale můžu se uhýbání více soustředit a použít na něj až šest bodů *Boje* z běžné akce
    > sedláka Pecivála liška překvapí druhým útokem ve stejném kole, na obranu hráběmi už Pecivál nemá body *Boje* a tak musí pouze uhýbat
- za jeden bod *Boje* se můžu posunout o jeden metr
  - přemýšlíme o schopnostech povolání, které by jim umožnily pohybovat se v boji úsporněji
  - mezi pohyb se nepočítá výpad vpřed a opětovné ustoupení na původní pozici, ani vzájemné kroužení, ale o posun mimo původní středobod, aniž bys dal protivníkovi záminku k nějaké výhodě
- "zadarmo" se můžu kdykoli dát do běhu plnou Rychlostí (útěk, pronásledování), ale u takového pohybu mám -6 ke všem činnostem od "teď" do konce příštího kola (ztratím kontakt s bojem) a během současné *vlny akcí* se vystavuju nebezpečí, že mě někdo zraní, podrazí nohy a podobně
  - bývá proto taktické nejdříve se opatrně vzdálit Pohybem (1 bod *Boje* za jeden metr) a teprve až když by nepřítel musel k tobě překonat tak velkou vzdálenost, že na útok mu už moc nezbude a bude bezzubý, tak se dát na útěk
    > "sedlák Pecivál zpanikaří, protože liška na nej dotírá nepřírozeně a beze strachu a dá se proto v půlce svého kola na nepromyšlený úprk, takže po své první akci, kdy spotřeboval 6 bodů *Boje* a zbývají mu 3, tyto 3 body *Boje* zahazuje a až do konce příštího kola má ke všemu kromě pohybu postih -6, tedy hlavně k Obranně. Kdyby trochu přemýšlel, tak by nejdříve použil 3 body *Boje* na posun o 3 sáhy a teprve poté se dal na útěk. Dlužno dodat, že lišku tím přestal zajímat, protože od začátku chtěla pouze jeho svačinu pro svá hladová liščata."
  - ten útěk to chce ještě promyslet
    - co například, že by mu to až na příští kolo dalo bonus +6 k *Boji*, aby byl rychlejší v reakcích, ale nemohl by provést nic jiného, než onen útěk?
    - na útěku tvor *je* (odpoutání z boje se mu povedlo *když*) ho nikdo před útěkem nezranil či jinak nezastavil (podražení nohou, chycení do lasa či bičem)
    - pronásledování bude to samé?
    - hned první kolo bude počítat svou plnou Rychlost, nebo se první kolo bude počítat vzdálenost podle jeho *Boje* (s +6 bonusem za nahlášený útěk?), takže na jeho útěk může kdokoli zareagovat a pronásledovat ho a až potom bude prchat plnou Rychlostí?
    > "Liška se nechala sedlákovým úprkem trochu překvapit, ale ukolíbaná úspěchem z ulovené svačiny se v klidu zakousla do voskovaného papíru, aby zjistila, že je prázdný a po salámu už jen voněl, v hlavě jí vyskočilo kňučení hladových liščat a s vrčením s vrhla za sedlákem. Sedlák má tedy díky nahlášenému útěku bonus +6 k *Boji* a díky tomu bude na konci tohoto kola daleko 9 + 6 = 15 metrů a pokud ho liška v tomto kole nekousne či alespoň nechytne za nohavici, tak už půjde o závod jejich nohou, ale hlavně se tím sedlák začne nebezpečně přibližovat k vesnici. Liška proto začne s pronásledováním a svých 13 bodů *Boje* použije na pronásledování, protože neví, že sedláka toto kolo nedožene a je tudíž na konci kola kousek za ním, takže sedlák se dostante do tempa a začne závod nohou (ve kterém je liška ve výhodě, takže se situace bude zřejmě opakovat, dokud jeden z nich nedosáhne úspěchu - liška jídla a sedlák klidu)"


#### Bič
- v boji je dobrý ledva na štípance a na odzbrojování, ale hodí se při pronásledování, kdy uprchlíkovi při úspěšném útoku omotá nohy a podrazí ho (ten si nepočítá zbroj).
        