# Zmrtvýchvstání odvozených vlastností

> Poslední lopata se líně zhoupla dolů, hlína a štěrk naposledy zabubnovaly na dubové víko a byla tma. Klidná, konejšivá, věčná tma. A z té tmy se ozývalo ťukání, tiché, nepravidelné a jakoby nejisté a kdo špicoval uši, mohl zaslechnout tenké hlásky, které se překrývaly navzájem "My už nebudeme složité. My už jsme taky primitivové, Nechybíme vám?"

*11. 11. 2018*

Ve *Velkém fanouškovi* jsme začali [pohřbívat *Odvozené vlastnosti*](2018-09-03-velkej_fanousek.md#Dovednosti), částečně proto, že některé z nich se pravidlově používají minimálně až vůbec a hlavně proto, že se s nimi nechceme [počítat](https://pph.drdplus.info/?version=1.0&trial=1#urceni_aspektu_vzhledu).

Od té doby jsme toho na blog nasypali dost a dost, až jsme v [neboji](2018-10-26-neboj.md#Jenom_akce) poprvé použili prosté výpočetní pravidlo

> podle toho, kterou z těchto vlastností máš **menší**

čímž [Odvozené vlastnosti](https://pph.drdplus.info/?version=1.0&trial=1#tabulka_odvozenych_vlastnosti) dostali druhou šanci, hlavně pak [Aspekty vzhledu](https://pph.drdplus.info/?version=1.0&trial=1#tabulka_aspektu_vzhledu), jejichž náročnost na spočítání a výsledný užitek byly z nejhorších.

Věc je to číselně prostá, byť je v ní malý trik *TODO kapitola s malým trikem a s tím, že se vlastnosti stejně zvyšují skoro až spolu - má ale taková kapitola ještě smysl?*.

## Číselně prostá věc

Vezmeme si k ruce přehled všech odvozených vlastností, které se musí počítat a navrch přidáme [znovuobjevené *Charisma*](2018-10-31-cit_pro_charisma.md#Cit_nad_Charisma)

| Vlastnost | Výpočet |
|-----|:---:|
| *Krása* | (*Obratnost* + *Zručnost*)/2 + *Chrarisma*/2 |
| *Nebezpečnost* | (*Síla*+*Vůle*)/2 + *Charisma*/2 |
| *Důstojnost* | (*Inteligence* + *Vůle*)/2 + *Charisma*/2 |
| *Výdrž* | (*Síla* + *Vůle*)/2 |
| *Rychlost* | (*Síla* + *Obratnost*)/2 |
| *Charisma* | (*Cit* + *Inteligence*)/2 |

Vypadá to hrozně, co?

Teď si uděláme malý průzkum do čísel a to rovnou legendárních. Hrdina těsně před sešlostí věkem, tedy na dvacáté první úrovni, bojovník na slovo vzatý, bude mít co nevyšší *Sílu* a *Obratnost*, aby zvýšil své šance na přežití, což u člověka z dobrého rodu bude přibližně jedenáct a ostatní, [vedlejší vlastnosti](https://pph.drdplus.info/?version=1.0&trial=1#tabulka_povolani) bude mít tak pět. Teď si posadíme pro porovnání výsledky dle původních pravidel a dle nového návrhu s *nejmenší ze všech zúčastněných vlastností*:

| Vlastnost | Hodnota dle *původních pravidel* | Hodnota dle *nejmenší vlastnosti* |
|-----|:---:|:---:|
| *Krása* | (11 + 5)/2 + 5/2 = **11** | **5** |
| *Nebezpečnost* | (11 + 5)/2 + 5/2 = **11** | **5** |
| *Důstojnost* | (5 + 5)/2 + 5/2 = **8** | **5** |
| *Výdrž* | (11 + 5)/2 = **8** | **5** |
| *Rychlost* | (11 + 11)/2  = **11** | **11** |
| *Charisma* | (5 + 5)/2 = **5** | **5** |

U nového návrhu je jasný propad, hlavně tam, kde se kombinují vysoké a nízké vlastnosti, což znamená [hlavní a vedlejší](http://pph.drdplus.loc:88/#tabulka_povolani), což dává logiku.
Ovšem my jsme rozdělení na hlavní a vedlejší vlastnosti [nedávno zrušili](2018-10-12-kombinace_povolani.md#Hlavní_a_hlavnější_vlastnost), změní to něco? No, popravdě ani ne, protože **hráč** bojovníka bude beztak klást důraz hlavně na *Sílu* a *Obratnost*, protože základní potřeba zůstává - aby zvýšil své šance na přežití. Takže nic, jdeme dál.

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

*Mimochodem, všimli jste si, že ty závorky jsou úplně k ničemu, tedy pokud zaokrouhlujeme až úplně na konci (což my děláme)?*

Zatímco u předchozích hodnot to vypadalo, že *úplně mimo* je náš nový návrh, u kterého jsou výsledné hodnoty zatraceně níž, než podle původních pravidel, tak s o něco vyššími vlastnostmi se najedou naprosto rozsypala původní pravidla 

- nebo ti připadá v pořádku mít nebezpečnost dvacet? vždyť by před tebou utíkaly i pařezy

Z tohohle souboje vychází vítězně nový návrh, takže zatím je to jedna:jedna na zápasy.

A co dál? Dál si připomeneme, na co jsme přišli v [Inteligentním bojovníkovi](2018-10-10-inteligentni_bojovnik.md#Zkrátka_inteligence) a to, že pro počet akcí potřebuju jak *Obratnost*, tak i *Inteligenci*, přičemž značná *Obratnost* s nízkou *Inteligencí* je tělo bez vlády a vysoká *Inteligence* s neohrabanou *Obratností* je vláda bez těla. Prostě výsledkem je **nižší** z obou vlastností, žádný průměr. Neplatí tohle náhodou pro každou kombinaci vlastností? Nebo alespoň pro některé?

## Krása

Krása má mnoho podob, ta nejviditelnější je nehybný vzhled, další je pak v ladnosti pohybu, další v jasnosti hlasu, další v chemii mezi dvěma bytostmi a určitě by se ještě něco našlo. Popravdě, krása je dobrý kandidát na vyškrtnutí z číselných pravidel, protože je zatraceně komplexní a pro každého v něčem jiném, ale jak jsme si už řekli, [chlapi čísla milujou](2018-10-31-cit_pro_charisma.md#Užitek_citu) a určitě se najde hráč, který se bude opájet krásou své *dvanáctky*.

Dáváme si za úkol popsat v pravidlech *Krásu* tak volně, aby každému bylo jasné, že číslo, které dostane, je ryze orientační a obecné a na každého bude ve finále jeho krása působit jinak.

Teď zpátky k číslu, *Krása* se původně zjišťovala

- z *Obratnosti*
    - proč ne, to je ta pružnost těla, která je vidět i když tvor jen tak postává
- ze *zručnosti*
    - to bude ta ladnost pohybů, to plynulé, klidné a přesné ovádání těla, které mnohé fascinuje
- z *Charisma*
    - takže z projevu, což začne platit v okamžiku, kdy se jedinec může předvést před ostatními

A co *Síla*, pevné tělo nepřitahuje? *Inteligence* vyzařující z očí či z projevu nezaujme? Snad jen *Vůle* a *City* jsou stranou, protože ani jedna z těchto dvou vlastností nebývá vidět hned a když už, tak jejich projev málokdo považuje za součást krásy. Aha, *Inteligence* tam patří, ale *Cit* ne? Tak to můžeme škrtnout *Charisma*, u kterého jsme zjistili, že se skládá z *Inteligence* a *Citu* a nahradit ho prostě *Inteligencí*.
Hmm, takže nově jsme nahradili *Charisma* za *Inteligenci*, přemýšlíme o přidání *Síly* a vlastně si nejsme jisti, jestli se nenajde jedinec, kterého nejvíce oslní pevná *Vůle* a porozumění *Citem*. To jsme si teda pomohli...

Krásu proto odsouváme na neurčito a je dost možné, že k ní pouze přidáme popis, příklady použití a na nějaké číselné vyjádření se vykašleme, protože když může být [nevyjádřená *Moudrost*](2018-10-10-inteligentni_bojovnik.md#S_moudrostí), tak *Krása* taky.

## Nebezpečnost

Z některých osob jde prostě strach. Někdo je tichý a jen upřeně zírá s lehkým úšklebkem v koutku úst, jiný funí, poulí očima, žíly mu nabíhají na krku, další se dívá nepřítomně, nezaujatě, ignorující prosby a nářky a z těch všech jde strach, pokud máme pocit, že nás můžou **ohrozit**.

Původní *Nebezpečnost* se počítala

- ze *Síly*
    - těžko se bránit silnějšímu, pokud je tu šance, že nás chytne do svého železného objetí
- z *Vůle*
    - chladné jednání vždycky děsilo, obzvlášť když jde o utrpení
- z *Charisma*
    - cílený psychický nátlak na obět se hodí, pokud ji chceme zahnat do úzkých

A *Inteligence* ne? Nikdy tě nemrazilo z génia, který živé tvory považuje za omyl evoluce? Snad jen *Zručnost* a možná *Obratnost* nezasahují do prvotního pocitu nebezpečí, ale jen do doby, než si uvědomíš, že protivník tě v obou vlastnostech převyšuje a že proti němu nemáš moc šancí.

To už je druhá odvozená vlastnost, do které se nám hodí každá základní vlastnost, něco tady smrdí... No, zkusíme další.

## Důstojnost

Klid, rozvaha, seběvědomí a nekončící vzdor i v těžkých chvílích udržují *Důstojnost* jedince na živu.

Původně se *Důstojnost* počítala

- z *Intelience*
    - je snazší překonat ponížení, když známe více možností, jak ze šlamastiky ven, takže proč ne
- z *Vůle*
    - zejména v těžkých chvílích je *Vůle* klíčová pro udržení své osobnosti v celku, takže ano
- *Charisma*
    - inu, je jednodušší zachovat si svobodnou vůli, když ovlivníme ty, kteří nám ji chtějí vzít, takže ano

Že by do důstojnosti zasahovala některá z tělesných vlsatností, to se nám nezdá, snad jen lehce *Zručnost*, díky které je snazší nést se vznešeně a klidně, což na mnohé důstojně zapůsobí. Ovšem máme tu ono *Charisma*, o kterém už víme, že je to spojení *Citu* a *Inteligence* a protože *Inteligenci* už v *Důstojnosti* máme, tak otázka je, zda ji ovlivní také *Cit*.
*Cit* ovlivní přívětivost nebo nepříjemnost, celkový příznivý či špatný dojem u ostatních, ale že by přímo *Důstojnost*... nebo že by šlo *Cit* použít k vycítění toho, co ostatní považují za důstojné a toho se držet? Nebo naopak vycítit, čím tě chtějí ponížit a tomu vědomě odolat? Že by ten *Cit* a tím vlastně celé Charisma byly pro důstojnost přeci jenom důležité?
*Důstojnost* je tak vlastně spolupráce všech tří základních duševních vlastností a my se můžeme začít ptát, zda můžeme u *Důstojnosti* použít pravidlo *nejmenší z vlastností*, ovšem necháme si to až ke konci.

## Výdrž

Neomdlít se zranění, přežít jed, vydržet ještě chvíli trýznivou žízeň, to vše a mnohem více zkouší, kolik vydržíme.


V původních pravidlech je výdrž spojením

- Síly
    - už při hledání základů pro *Charisma* jsme o Síle [mluvili jako o síle těla](2018-10-31-cit_pro_charisma.md#Nějaká_drobnost), o jeho odolnosti na tělesnou zátěž, takže jo, *Síla* do *Výdrže* patří
- Vůle
    - to je v bledě modrém to samé jako *Síla*, však už jsme taky [souhlasili](2018-10-31-cit_pro_charisma.md#Nějaká_drobnost), že *Vůle* je silou ducha a podobně jako zátěži odolává tělo, tak nám může pomoci potíže překonat i silná mysl, takže s *Vůlí* také souhlasíme

Výdrž vypadá stabilně, i u ní se můžeme začít ptát, jestli pro ní jde použít pravidlo nejmenší z vlastností, jen nám začíná narůstat tlak na takovéto klasické **ale**. Ale co když je tvor v bezvědomí, ale co když necítí své tělo, ale k tomu se dostaneme až za chvíli.

## Rychlost

Přeskočit, vyhnout se, kmitat nohama v přesném sledu, využívat podloží, odrážet se od překážek a další drobnosti skládají dohromady rychlost pohybu.

V původních pravidlech je kombinuje

- *Síla* 
    - chvíli nám trvalo, než jsme *Sílu* bez podmínek přijali do *Rychlosti*, protože jsme si chvíli představovali, jak Zetor dostane o motor navíc a byť mu to umožní utáhnout větší valník, tak jeho rychlost bez naložení to nezmění, pak nám ale došlo, že *Síla* není jen o koňských silách, ale také o znalosti svého těla a o schopnosti ho efektivně používat, včetně hopsání po krokodýlech a sprintu mezi explodujícími dlaždicemi, takže ano, *Síla* do *Rychlosti* patří
- *Obratnost*
    - jestli něco vyjadřuje rychlost pohybů, tak je to *Obratnost*, takže ano, *Obratnost* je také právoplatným členem *Rychlosti*

Chvíli jsme koketovali s *Inteligencí*, protože chytřejší tvor dokáže lépe využít prostor a třeba najít rychlejší cestu, ale brzy jsme zjistili, že jsme sem začali tahat dovednosti a zvláštní schopnosti povolání, takže necháváme *Rychlost* tak, jak je, bez připomínek. *TODO velikost postavy*.

Vnitřně jsme si už prošli myšlenkovým pochodem, který nás dovedl k prostému zjištění, že takové zjednodušené pravidlo lze bez obav použít jen na tvory stavbou těla podobné člověku, protože zajíce bychom jinak chytali do klobouků jak motýly.

## Charisma

To už jsme [řešili](2018-10-31-cit_pro_charisma.md), ne?

## Ale

TODO Ale když mícháme tělesné a duševní vlastnosti, tak to skřípe - Krásu asi chceme když tvor spí a duše je vypnutá, ale dá se ovlivnit aktivně, stejně tak nebezpečnost by se měla rozdělit na tu pasivní, když někdo jen tak je, a na aktivní, když se někdo snaží zastrašovat a podobně i Výdrž, kde Vůle je aktivní boj s následky, které tělo nezvládá (a mělo by to unavovat?).

---

- *předchozí [<< 31. 10. 2018 Cit pro charisma](2018-10-31-cit_pro_charisma.md)*
