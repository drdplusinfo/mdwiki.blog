# Zmrtvýchvstání odvozených vlastností

*20. 3. 2019*

> Poslední lopata se líně zhoupla dolů, hlína a štěrk naposledy zabubnovaly na dubové víko a byla tma. Klidná, konejšivá, věčná tma. A z té tmy se ozývalo ťukání, tiché, nepravidelné a jakoby nejisté a kdo špicoval uši, mohl zaslechnout tenké hlásky, které se překrývaly navzájem "My už nebudeme složité. My už jsme taky primitivové. Nechybíme vám?"

*Kterak jsme odvozené vlastnosti DrD plus zahodili, protože v nich něco smrdí, abychom je po chvíli zase oživovali, protože nám ten smrad nedal a my hledali a hledali, až jsme našli jeho zdroj.*

Ve *Velkém fanouškovi* jsme začali [pohřbívat *Odvozené vlastnosti*](2018-09-03-velkej_fanousek.md#Dovednosti), částečně proto, že některé z nich se pravidlově používají minimálně až vůbec a hlavně proto, že se s nimi **nechceme** [počítat](https://pph.drdplus.info/?trial=1#urceni_aspektu_vzhledu).

Od té doby jsme toho na blog nasypali dost a dost, až jsme v [Neboji](2018-10-26-neboj.md#Jenom_akce) poprvé použili prosté výpočetní pravidlo

> ...podle toho, kterou ze zúčastněných vlastností máš **menší**

čímž skládané [Odvozené vlastnosti](https://pph.drdplus.info/?trial=1#tabulka_odvozenych_vlastnosti) dostávají druhou šanci, hlavně pak [Aspekty vzhledu](https://pph.drdplus.info/?trial=1#tabulka_aspektu_vzhledu), jejichž náročnost na spočítání a výsledný užitek, onen známý poměr *cena x výkon*, byly z nejhorších a například *Krásu* jsme i kvůli tomu [už zakopali](2018-11-09-vzpominky_na_krasu.md).

## Druhá šance

Vezmeme si k ruce přehled všech odvozených vlastností z DrD+, které se musí počítat a navrch přidáme [znovuobjevené *Charisma*](2018-10-31-cit_pro_charisma.md#Cit_nad_Charisma)

| Vlastnost | Výpočet |
|-----|:---:|
| *Krása* | (*Obratnost* + *Zručnost*)/2 + *Charisma*/2 |
| *Nebezpečnost* | (*Síla*+*Vůle*)/2 + *Charisma*/2 |
| *Důstojnost* | (*Inteligence* + *Vůle*)/2 + *Charisma*/2 |
| *Výdrž* | (*Síla* + *Vůle*)/2 |
| *Rychlost* | (*Síla* + *Obratnost*)/2 |
| *Charisma* | [(*Cit* + *Inteligence*)/2](2018-10-31-cit_pro_charisma.md#Závěr) |

> Vypadá to hrozně, co?

Teď si uděláme malý průzkum do čísel a to rovnou legendárních. Hrdina těsně před sešlostí věkem, tedy na [nejvyšší dvacáté první úrovni](https://pph.drdplus.info/?trial=1#tabulka_zkusenosti), bojovník na slovo vzatý, bude mít co nejvyšší *Sílu* a *Obratnost*, aby zvýšil své šance na přežití (a protože to jsou jeho [hlavní vlastnosti](https://pph.drdplus.info/?trial=1#tabulka_povolani)), což u [člověka](https://pph.drdplus.info/?trial=1#tabulka_ras) z dobrého rodu bude přibližně jedenáct a ostatní, [vedlejší vlastnosti](https://pph.drdplus.info/?trial=1#tabulka_povolani) bude mít tak pět. Teď si posadíme pro porovnání výsledky dle *původních pravidel* a dle nového návrhu s *nejmenší ze všech zúčastněných vlastností* vedle sebe:

| Vlastnost | Hodnota dle *původních pravidel* | Hodnota dle *nejmenší vlastnosti* |
|-----|:---:|:---:|
| *Krása* | (11 + 5)/2 + 5/2 = **11** | **5** |
| *Nebezpečnost* | (11 + 5)/2 + 5/2 = **11** | **5** |
| *Důstojnost* | (5 + 5)/2 + 5/2 = **8** | **5** |
| *Výdrž* | (11 + 5)/2 = **8** | **5** |
| *Rychlost* | (11 + 11)/2  = **11** | **11** |
| *Charisma* | (5 + 5)/2 = **5** | **5** |

*Mimochodem, všimli jste si, že ty závorky v původních výpočtech jsou úplně k ničemu? Tedy pokud zaokrouhlujete až úplně na konci, což my děláme.*

U nového návrhu je jasný propad, hlavně tam, kde se kombinují vysoké a nízké vlastnosti, což znamená [hlavní a vedlejší vlastnosti](https://pph.drdplus.info/?trial=1#tabulka_povolani), což dává logiku, když místo průměru použijeme jen mrňouse.
Ovšem my jsme rozdělení na hlavní a vedlejší vlastnosti [nedávno zrušili](2018-10-12-kombinace_povolani.md#Hlavní_a_hlavnější_vlastnost), změní to něco? No, popravdě ani ne, protože **hráč** bojovníka bude beztak klást důraz hlavně na *Sílu* a *Obratnost*, protože základní potřeba zůstává - *aby zvýšil své šance na přežití*. Takže nic, velké rozdíly vlastností zůstanou, jdeme dál.

Další změna, kterou jsme nedávno navrhli, posunuje nulové začátečnické vlastnosti z [nuly na šest](2018-10-22-nula.md#Šestka), změní tohle něco? No, když se posunul začátek, tak se taky posunul konec, ne? Ani ne, už jsme naznačovali, že horní hranice vlastností [bude dvanáct](2018-10-29-minuta_inteligence.md#Baba_minuta). Trochu jsme ale zatajili, že to není absolutní strop, takže pokud teď trochu předběhneme dobu, tak můžeme vyřknout naprosto *nepromyšlený* stav našeho borce, který bude na neuvěřitelné jednadvacáté úrovni mít

- *Sílu* patnáct
- *Obratnost* deset
- *Zručnost* sedm
- *Vůli*, *Inteligenci* a *Charisma* (respektive *Cit*) svorně na dvanácti

Změní to nějak zásadně naši tabulku výsledků?

| Vlastnost | Hodnota dle původních pravidel | Hodnota dle *nejmenší vlastnosti* |
|-----|:---:|:---:|
| *Krása* | (10 + 7)/2 + 12/2 = **15** | **7** |
| *Nebezpečnost* | (15 + 12)/2 + 12/2 = **20** | **12** |
| *Důstojnost* | (12 + 12)/2 + 12/2 = **18** | **12** |
| *Výdrž* | (15 + 12)/2 = **14** | **12** |
| *Rychlost* | (15 + 10)/2  = **13** | **10** |
| *Charisma* | (12 + 12)/2 = **12** | **12** |

Zatímco u předchozích hodnot to vypadalo, že *úplně mimo* je náš nový návrh, tak s o něco vyššími vlastnostmi se najednou naprosto rozsypala původní pravidla.
> Nebo ti připadá v pořádku mít nebezpečnost dvacet? Vždyť by před tebou utíkaly i pařezy.

Z tohohle souboje vychází vítězně nový návrh, takže zatím je to 1:1 na zápasy.

A co dál? Dál si připomeneme, na co jsme přišli v [Inteligentním bojovníkovi](2018-10-10-inteligentni_bojovnik.md#Zkrátka_inteligence) a to, že pro počet akcí potřebuji jak *Obratnost*, tak i *Inteligenci*, přičemž značná *Obratnost* s nízkou *Inteligencí* je tělo bez vlády a vysoká *Inteligence* s neohrabanou *Obratností* je vláda bez těla. Prostě výsledkem je **nižší** z obou vlastností, ~~žádný průměr~~. Neplatí tohle náhodou pro každou kombinaci vlastností? Nebo alespoň pro některé?

Ovšem než se k odpovědi dostaneme, budeme si muset nejdříve v odvozených vlastnostech trochu uklidit. 

## Vlastnosti jedna po druhé

Nastal čas vytáhnout klepadlo, metlu a vyprášit *Odvozené vlastnosti*, co to jen půjde.

### Krása

Krása má mnoho podob, ta nejviditelnější... tak počkat, tohle už jsme [vyřešili](2018-11-09-vzpominky_na_krasu.md), ne? Krásu jsme přece zakopali (i proto, že ji každý vnímá jinak) a na její místo posadili *Charisma*. Jdeme dál.

### Nebezpečnost

Z některých osob jde prostě strach. Někdo je tichý a jen upřeně zírá s lehkým úšklebkem v koutku úst, jiný funí, poulí očima, žíly mu nabíhají na krku, další se dívá nepřítomně, nezaujatě, ignorujíc prosby a nářky a z těch všech jde strach, pokud máme pocit, že nás můžou **ohrozit**.

Původní *Nebezpečnost* se [zjišťovala](https://pph.drdplus.info/?trial=1#vypocet_nebezpecnosti)

- ze *Síly*
    - těžko se bránit silnějšímu, pokud je tu šance, že nás chytne do svého železného objetí
- z *Vůle*
    - chladné jednání vždycky děsilo, obzvlášť při utrpení
- z *Charisma*
    - cílený psychický nátlak na oběť se hodí, pokud ji chceme zahnat do úzkých

A *Inteligence* ne? Nikdy tě nemrazilo z génia, který živé tvory považuje za omyl přírody? Snad jen *Zručnost* a možná *Obratnost* nezasahují do prvotního pocitu nebezpečí, ale jen do doby, než si uvědomíš, že protivník tě v obou vlastnostech převyšuje a že proti němu nemáš moc šancí.

Vypadá to, že do *Nebezpečnosti* se nám hodí **každá** základní vlastnost, zvláštní, něco tady smrdí... No, zkusíme další odvozenou vlastnost a smrad [vyvětráme až na závěr](#Ale_to_je_smrad).

### Důstojnost

Klid, rozvaha, sebevědomí a nekončící vzdor i v těžkých chvílích udržují naši *Důstojnost* naživu.

Původně se *Důstojnost* [určovala](https://pph.drdplus.info/?trial=1#vypocet_dustojnosti)

- z *Inteligence*
    - je snazší překonat ponížení, když známe více možností, jak ze šlamastiky ven, takže proč ne
- z *Vůle*
    - zejména v těžkých chvílích je *Vůle* klíčová pro udržení své osobnosti v celku, takže ano
- *Charisma*
    - inu, je jednodušší zachovat si svobodnou vůli, když ovlivníme ty, kteří nám ji chtějí vzít, takže ano

Že by do důstojnosti zasahovala některá z tělesných vlastností, to se nám nezdá, snad jen lehce *Zručnost*, díky které je snazší nést se vznešeně a klidně, což na mnohé důstojně zapůsobí. Ovšem v *Důstojnosti* už máme ono *Charisma*, o kterém [už víme](2018-10-31-cit_pro_charisma.md#Závěr), že je to spojení *Citu* a *Inteligence* a protože *Inteligenci* už v *Důstojnosti* máme, tak otázka je, zda ji ovlivní také *Cit*.

*Cit* ovlivní přívětivost nebo nepříjemnost vystupování, celkový příznivý či špatný dojem u ostatních, ale že by přímo ovlivňovala *Důstojnost*... nebo že by šlo *Cit* použít k vycítění toho, co ostatní považují za důstojné a toho se držet? Nebo naopak vycítit, čím nás chtějí ponížit a tomu vědomě odolat? Že by ten *Cit* a tím vlastně celé *Charisma* byly pro důstojnost přeci jenom důležité? Už to tak bude.
*Důstojnost* je tak vlastně spolupráce všech tří základních duševních vlastností a my se můžeme začít ptát, zda můžeme u *Důstojnosti* použít pravidlo *nejmenší z vlastností*.

Jde vlastně o obecnou platnost pravidla
> Řetěz je tak silný, jak silný je jeho nejslabší článek

a na nás teď je, abychom zjistili, zda *Důstojnost* je řetěz ze tří vlastností, nebo visí na třech oddělených lanech.

#### Řetěz a lano
Udržet si *Důstojnost* je jako udržet si důvěru. A důvěru v nás dokáže zničit jedna jediná událost, jedno jediné zklamání, ať už za ně může naše nízká inteligence, chybějící vůle nebo nedostatek citu.
> Tak počkat, když selžu jako kuchař, tak ztratím důvěru i jako řidič?

To sotva, stejně jako důstojnost ztracená při vaření ztěží ovlivní důstojnost při řízení. Jsou to dvě odlišné situace, dvě odlišná prostředí a herně by to byly dva odlišné hody.

Důstojnost proto budeme zjišťovat jako nejmenší ze tří základních duševních vlastností, *Inteligence*, *Vůle* a *Citu*.

### Výdrž

Neomdlít se zranění, přežít jed, vydržet ještě chvíli trýznivou žízeň, to vše a mnohem více zkouší, kolik vydržíme.

V původních pravidlech je [výdrž](https://pph.drdplus.info/?trial=1#vydrz) spojením

- *Síly*
    - už při hledání základů pro *Charisma* jsme o Síle [mluvili jako o síle těla](2018-10-31-cit_pro_charisma.md#Nějaká_drobnost), o jeho odolnosti na tělesnou zátěž, takže jo, *Síla* do *Výdrže* patří
- *Vůle*
    - to je v bledě modrém to samé jako *Síla*, však už jsme taky [souhlasili](2018-10-31-cit_pro_charisma.md#Nějaká_drobnost), že *Vůle* je silou ducha a podobně jako zátěži odolává tělo, tak nám může pomoci potíže překonat i silná mysl, takže s *Vůlí* také souhlasíme

Výdrž vypadá stabilně, i u ní se můžeme začít ptát, jestli pro ni jde použít pravidlo *nejmenší z vlastností*, jen nám tu zase něco mírně zapáchá, jak nám začíná narůstat tlak na takovéto klasické **ale**. Ale co když je tvor v bezvědomí, počítá si *Vůli*? Ale co když necítí své tělo, zmůže něco *Síla*? Ale k tomu se dostaneme až [za chvíli](#Ale_to_je_smrad).

### Rychlost

Přeskočit, vyhnout se, kmitat nohama v přesném sledu, využívat podloží, odrážet se od překážek a další drobnosti skládají dohromady rychlost našeho pohybu.

V původních pravidlech tyto drobnosti vyjadřuje

- *Síla* 
    - chvíli nám trvalo, než jsme *Sílu* bez podmínek přijali do *Rychlosti*, protože jsme si chvíli představovali, jak [Zetor](https://www.zetor.cz/zetor-by-pininfarina-se-predstavila-v-nizozemi) dostane o motor navíc a byť mu to umožní utáhnout větší valník, tak jeho rychlost bez naložení to nezmění, pak nám ale došlo, že *Síla* není jen o koňských silách, ale také o znalosti těla a o schopnosti ho **efektivně** používat, včetně hopsání po krokodýlech a sprintu mezi explodujícími dlaždicemi, takže ano, *Síla* do *Rychlosti* patří
- *Obratnost*
    - jestli něco vyjadřuje rychlost pohybů, mrštnost a hbytost, tak je to *Obratnost*, takže ano, *Obratnost* je také právoplatným členem *Rychlosti*

Chvíli jsme koketovali s *Inteligencí*, protože chytřejší tvor dokáže lépe využít prostor a třeba najít rychlejší cestu, ale brzy jsme zjistili, že jsme do vlastností začali tahat dovednosti a [zvláštní schopnosti povolání](https://zlodej.drdplus.info/?trial=1#utek), takže necháváme *Rychlost* tak, jak je, bez připomínek. Totiž, vlastně ne tak docela, zapomněli jsme na vliv *Velikosti*.

Vliv *Velikosti* na *Rychlost* jsme řešili na RPG fóru, kde jsme se dohrabali až k [matematickým důkazům](https://rpgforum.cz/forum/viewtopic.php?f=238&t=14936&start=75#p539199) a zkrácený závěr je, že

- velikost nemá na rychlost tvora přímý vliv
    - proto nejsou třeba [monster trucky rychlejší než formule](TODO link na youtube)
- když je větší tvor rychlejší než menší tvor, tak je to kvůli vyšší *Síle*, nikoli kvůli delším nohám

Takže ještě jednou, *Rychlost* necháváme **téměř** tak, jak je, jen rušíme ~~vliv *Velikosti*~~ na *Rychlost*.

A ještě přidáme poznámku k výpočtu *Rychlosti* - vnitřně jsme si už prošli myšlenkovým pochodem, který nás dovedl ke zjištění, že prostá kombinace *Síly* a *Obratnosti* lze pro *Rychlost* bez obav použít jen na tvory *stavbou těla* podobné člověku, protože jinak bychom zajíce chytali do klobouků jako motýly.
Obecně jde právě o onu *stavbu těla*, která s *Rychlostí* nakonec [zamává natolik](TODO nejrychlejší tvor planety), že u příšer s takovými počty nepochodíme.

U *Rychlosti* se o něco hůře obhajuje pravidlo *menší z obou vlastností*, protože je snadné představit si sprintera, který se i po pěti pivech a dvou žitných stále řítí vpřed stejnou rychlostí, jen nedejbože aby musel mírně zatočit. TODO to už je o náročnosti trati a o pasti na Obratnost.

### Charisma

Zapůsobit na ostatní, strhnout je na svou stranu, ovlivnit jejich rozhodnutí, vyvolat v nich kýžený pocit a vůbec ovlivňovat emoce ostatních tak, jak my pískáme, to je naše charisma.

Ovšem Charisma jsme už [řešili](2018-10-31-cit_pro_charisma.md), ne? Jo, takže připomeneme pouze, že **nově** je *Charisma* použití

- *Citu*
    - což je nová základní vlastnost, v níž jsou ženy často ve výhodě
- *Inteligence*
    - s jejíž pomocí *Cit* cíleně použiješ na ovlivnění ostatních

Také na *Charisma* můžeme použít pravidlo *menší z obou vlastností*.

## Ale to je smrad

A je to tady, dostáváme se konečně k tomu, co jsme naznačovali už [u *Krásy*](2018-11-09-vzpominky_na_krasu.md#Druhy_krás), že u některých odvozených vlastností něco smrdí, občas to zaskřípe a vůbec je to jedno velké **ale**.

Na onen zápach jsme upozorňovali u *Krásy*, *Nebezpečnosti* a *Výdrže*, ale nenašli jsme ho u *Důstojnosti*, *Rychlosti* a *Charisma*. Co je na těhle dvou skupinách tak odlišného? A co mají vlastnosti ze stejné skupiny natolik shodného?
Je to kombinace tělesných a duševních vlastností, slovy [Dračího doupěte II](http://drd2.cz) je to kombinace *Těla* a *Duše*. Tam, kde se *Tělo* a *Duše* míchají, tam nám to smrdí, a tam kde jsou vlastnosti složeny pouze z *Těla* nebo pouze z *Duše*, tam je to v pořádku. Jde se větrat.

### Větrání smradu

Když to vezmeme popořadě a dáme ještě jednu šanci *Kráse*, tak... tak nic, *Krása* je vlastně u ledu, takže další na řadě je *Nebezpečnost* a její tělesná a duševní složka.

#### Nebezpečný spánek

TODO není nebezpečnost jen převrácená Krása? Asi ne, představy o nebezepečí jsou celkem jednotné.

I *Nebezpečnost* si koleduje o rozdělení na pasivní složku, tu část, která platí i ve spánku (nebo se snad spícího draka nebojíš?) a na aktivní složku, kterou můžeš činorodě ovlivňovat.

Pasivní nebezpečnost vidíme v

- *Síle*
    - *jestli naštveme tuhle hroudu svalů, tak všichni svatí s námi*
- v pověsti
    - *a je to v kelu, proti nám jde Xavier Oslepovač*
- ve výbavě
    - *nevím co je to za nulu, ale jestli ví, že co drží v pazouře není klepadlo na koberce, tak já to balím*
- v počtu
    - *neletí ten mrak nějak rychle?*
    - číselně by to ale mělo řešit pravidlo *Hejna*, což je v tomhle případě vlastně sčítání *Síly* - dostaneme se k němu někdy příště

Pasivní nebezpečnost je tedy rovna *Síle*, ostatní pasivní části pokryjeme *Pověstí* (kterou ještě nemáme promyšlenou) a radami pro Pána jeskyně, jak řešit nebezpečnost z předmětů, ošacení a výbavě vůbec. A taky chceme oprášit [pravidlo *Hejna*](https://bestiar.drdplus.info/?trial=1#charakteristika_hejna), které bychom chtěli natolik univerzální, aby platilo pro dva hrdiny zvedající železnou mříž a stejně tak pro mračno žíznivých komárů.

TODO aktivní složka nebezpečnosti

- Charisma

#### Výdrž

a podobně i Výdrž, kde Vůle je aktivní boj s následky, které tělo nezvládá (a mělo by to unavovat?).

---

- *předchozí [<< 15. 3. 2019 Představy minulosti - Mýty](2019-03-15-predstavy_minulosti_myty.md)*