# Inteligentní bojovník

*10. 10. 2018*

> Inteligence má mnoho podob, pro hlupáky neviditelných

Při rozsáhlém [zkoumání, pitvání a nakonec i úpravách *Boje*](2018-08-10-boj.md) jsme mimo jiné došli k tomu, že

- *Boj* bude vycházet pouze z *Obratnosti*
- počet možných akcí v jednom kole je ovlivněn pouze *Bojem*
- body *Boje* lze, v rámci jednoho kola, přelévat mezi akcemi jak je libo (protože se za body *Boje* dají "kupovat" bonusy)

A trochu se nám to od té doby rozleželo. S tou *Obratností* se nám to pořád líbí, protože to je jednoduché a dává nám to smysl, ovšem jinak to už vnímáme s počtem akcí a přesouváním bodů *Boje*. 

## Zkrátka inteligence

V návrhu *Boje* jsme chtěli mít počet akcí podle bodů *Boje*, což zní celkem jednoduše:

- máš tolik akcí, kolik máš bodů *Boje* vydělených šesti, zaokrouhleno nahoru
    - třeba s *Bojem* 7 bys měl dvě akce, protože 7 / 6 = 1.16666..., zaokrouhleno nahoru jsou 2
 
A chtěli jsme, aby ses mohl na každou akci soustředit tak, jak si zaslouží:
 
- mezi akcemi můžeš body *Boje* přesouvat
    - za každý bod *Boje* **navíc**, který jsi na akci použil, máš k akci bonus +1
    - za každý **chybějící** bod *Boje* máš k akci postih -1

To, co nám teď vadí, je závislost počtu akcí **pouze** na *Obratnosti*. Několikrát jsme byli v životní situaci, kdy jsme zůstali zkoprněle civět, popřípadě jsme se zmohli ledva na opatrný pohyb, zatímco ostatní na nás hulákali *ať něco děláme, sakra*! Prostě nám to v tu chvíli mozek nepobral, ať už na nohejbale, na křižovatce, nebo v případě mého bratra na štaflích, ale to odbočujeme. Prostě tělo by mohlo, ale hlava ani omylem.

A obráceně to známe také, kdy víme, jak na to, ale tělo to prostě nezvládne. Třeba když sledujeme fakt pěknou hrušku na vrcholu, kam by naše tělo před deseti lety a dvaceti kily ještě vylezlo, takže víme jak na to, jen to už nejde, nebo při dobíhání vlaku, kdy hlava ví, že podlézt horkovod by bylo rychlejší, ale tělo návrh zamítne.

Takže nám kapánek schází ten vliv *Inteligence* na počet akcí.

A pak je tu ten druhý aspekt - zaokrouhlování. Teď je na čase uronit slzu nostalgie a zavzpomínat na **staré** dobré Dračí doupě, kde se jen sčítalo a odčítalo. Zaokrouhlování tam nemělo místo a v tom byla obrovská síla, protože hlava tak nebyla zatížena ani takovými výpočetními drobotinami a mohla se **naplno** věnovat zážitkům ze hry.

### Nemyslíš, zaplatíš

A tak nás trklo, že by počet akcí mohl být roven *Inteligenci*. A hotovo.

- a co nulová a záporná *Inteligence*?
    - necháme každého provést alespoň jednu akci, ať už má *Inteligenci* sebemenší a prohlásíme to za instinkt
- takže prostý tvor nemá šanci si zvýšit šance?
    - Paul nás v [markách](https://paper.dropbox.com/doc/Marky-hrdinu-i-padouchu--AOfhhadcneHIdLCOjivQRmpbAQ-4WNOSwzOGzSDLguzneiHn) inspiroval *Taktikem*, který používá rozum tam, kde ostatní dají pouze smysly a z toho bychom chtěli udělat obenou *Dovednost*, která přidá *bojovou inteligenci*, tedy zvýší počet akcí
- a co body *Boje*, ty pořád ovlivňují počet akcí?
    - hmm, to budeme muset probrat

#### Body boje a počet akcí

Původně jsme počet akcí přímo podřizovali **celkovým** bodům *Boje*. Přestože jsi mohl body *Boje* přesouvat sem a tam, tak od začátku ti už diktovaly, kolik různých činností v jednom kole zvládneš. No, nezní to *úplně* pitomě, ale je to takové strojové, takové předem naplánované, takové... nepřirozené.

Teď, když jsme celé to zjišťování, kolik vlastně máme v tomhle kole akcí, zjednodušili na velikost *Inteligence*, tak bychom vliv *Boje* mohli zahodit, ne?
No, **pevný** počet akcí by asi *Boj* ovlivňovat neměl, protože sám pevný **není**, když můžeme s body *Boje* čachrovat jak při skořápkách, ale kde není *Boj*, neměla by být ani akce, jak jsme si ukázali na případech schopnější mysli než těla, takže?

Takže můžeme oprášit jeden z nápadů v [původním návrhu *Boje*](2018-08-10-boj.md) a říct, že:

- akcí můžeš provést kolik chceš, pokud na to máš body *Boje* a nově také *Inteligenci*
    - s tím že každá akce stojí šest nebo tři body *Boje*, podle toho, jestli vyžaduje *plné* nebo *volné* soustředění a pokud použiješ méně bodů *Boje*, budeš mít k akci postihy
- pokud nemáš **žádné** body *Boje*, tak pořád můžeš udělat tolik akcí, kolik ti *Inteligence* dovolí (samozřejmě s velkým postihem, viz výše), vždy alespoň jednu, plus jednu automatickou (to je změna oproti původnímu návrhu, kdy bez energie na běžnou akci nešlo provést ani automatickou)
- pokud máš body *Boje* **záporné**, tak už ti nepomůže ani *přípravný kurz na univerzitu* (můžeme tomu říkat třeba bojová paralýza)

A co omezení bodů *Boje*, které lze přesouvat? To necháme prostě na šesti jako předtím? Žádná vlastnost nám to neovlivní?

### Zručný přesun bodů *Boje*

Vrtá nám hlavou tedy ještě jedna věc, totiž když *Inteligence* ovlivňuje počet akcí, které za kolo duševně zvládnu, tak co ovlivňuje počet bodů *Boje*, které mohu mezi akcemi přesunout?

Kdybychom se bavili pouze o těle, tak můžeme říci, že důraz na jednu akci a odfláknutí druhé závisí na naší *Obratnosti*. Jenže, *trochu větší důraz* a *trochu menší důraz*... není to spíš o citu než o mrštnosti? Že by *Zručnost*? Nebo rovnou *Smysly*?
Kdyby to byly *Smysly*, co nám umožňují citlivě rozprostřít energii mezi jednotlivé akce, tak jak **chceme**, tak bychom museli taky říct, které z mnoha smyslů to jsou. Sluch? Zrak? Hmat? Všechny dohromady? A nejsou náhodou všechny dohromady *Zručnost*? No, není, všechny dohromady jsou Smysly, v nichž [některá povolání excelují](http://zlodej.drdplus.loc:88/#zdokonalene_smysly)... počet bodů *Boje*, které můžeš přesouvat mezi akcemi, by **mohla** ovlivňovat *Zručnost*

Ovšem jen o těle se se nebavíme, když jsme přijali *Inteligenci* jako ukazatel počtu akcí, které zvládnu provést. Pokud mám dostatek tělesné *Zručnosti* na jemné nuance mezi akcemi, tak bych měl mít i dostatek duševní zručnosti, abych ty odlišné důrazy na jednotlivé akce i zvládl promyslet, nebo alespoň instinktivně odhadnout. Jenže, co je ta duševní zručnost? Že by *Inteligence*? Nebo je to prostě *Zručnost*, o které nás jen doteď nenapadlo, že v sobě vlastně skrývá i zručnost duševní, tedy schopnost promýšlet či prociťovat drobné detaily? A co *Moudrost*?

#### Moudrost
Už několikrát nás napadlo, že v Dračím doupěti, žádném z nich, není moudrost. Vlastně v [Dračím doupěti II](https://drd2.cz) by být mohla ze všech verzí nejvíc, skryta v *Duši*.
Obecně už ale máme několik let za to, že chybějící moudrost jako číslo je velká **výhoda**, protože nás nenutí hrát moudré, či naopak zbrklé jedince, prostě v tom máme volnost. A teď bychom si ji chtěli vzít kvůli boji? Co je to za nerozumný návrh? A co je to vlastně moudrost?

Když se někdo chová moudře, rozumně, tak jedná s rozvahou, ví, co ho za jeho jednání čeká, dokáže své úmysly často vysvětlit i ostatním, pokud mu na to dají čas, je otevřený myšlenkám druhých a přemýšlí i o jejich názorech, protože mu zpřesňují jeho odhad budoucnosti, toho, jak to nakonec dopadne, aby se mohl lépe rozhodnout. Moudrý člověk obvykle ví, co dělá, kam jde a co z toho bude a hlavně vidí více **možností**, než ti méně osvícení.

Parafrázovat moudrost můžeme i tak, že

> Chytří tak dlouho dokazují, že něco nejde, až přijde moudrý a udělá to

Kdybychom se vrátili k boji a tam hledali, kdo má větší převahu, kdo vidí více možností, kdo se dokáže starat sám o sebe a ještě zvádá radit ostatním, tak nakonec ukážeme prstem na toho, kdo má nejvíc bodů *Boje*. To nějak nesedí... aha, on by ten moudrý dost možná eo boje ani nešel a snažil by se najít méně destruktivní cestu k vítězství. Či možná ještě lépe, ke spolupráci.

Ona moudrost se do boje moc nehodí a necháme ji proto zatím tam, kde je, tedy skryta ve zkušenostech a úrovních postavy.

#### Bez moudrosti

*Moudrost* nám vypadla, zbývá *Charisma*, *Vůle* a *Síla*.

*Charisma* je zejména schopnost ovlivňovat a působit na ostatní. To se bude hodit při zastrašování, povzbuzování a vyjednávání, ale při drobných úpravách útoků, obran a čarodějných kejklí? Kdepak.
A pak už jen *Vůle*, protože