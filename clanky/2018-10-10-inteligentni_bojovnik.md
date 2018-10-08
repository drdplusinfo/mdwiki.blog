# Inteligentní bojovník

*10. 10. 2018*

> Inteligence má mnoho podob, pro hlupáky neviditelných

Při rozsáhlém [zkoumání, pitvání a nakonec i úpravách *Boje*](2018-08-10-boj.md) jsme mimo jiné došli k tomu, že

- *Boj* bude vycházet pouze z *Obratnosti*
- počet možných akcí v jednom kole je ovlivněn pouze *Bojem*
- body *Boje* lze, v rámci jednoho kola, přelévat mezi akcemi jak je libo

A trochu se nám to od té doby rozleželo.
S tou *Obratností* se nám to pořád líbí, protože to je jednoduché a dává nám to smysl, ovšem jinak to už vnímáme s počtem akcí a přesouváním bodů *Boje*. 

## Zkrátka inteligence

V návrhu *Boje* jsme chtěli mít počet akcí podle bodů *Boje*, což zní celkem jednoduše:

- máš tolik akcí, kolik máš bodů *Boje* vydělených šesti, zaokrouhleno nahoru
    - třeba s *Bojem* 7 bys měl dvě akce, protože 7 / 6 = 1.16666..., zaokrouhleno nahoru jsou 2
 
A chtěli jsme, aby ses mohl na každou akci soustředit tak, jak si zaslouží: 
- mezi akcemi můžeš body *Boje* přesouvat
    - za každý bod *Boje* **navíc**, který jsi na akci použil, máš k akci bonus +1
    - za každý **chybějící** bod *Boje* máš k akci postih -1

To co nám vadí, je závislost počtu akcí **pouze** na *Obratnosti*. Několikrát jsme byli v životní situaci, kdy jsme zůstali zkoprněle civět, či jsme se zmohli ledva na opatrný pohyb, zatímco ostatní na nás hulákali *ať něco děláme, sakra*! Prostě nám to v tu chvíli mozek nepobral, ať už na nohejbale, na křižovatce, nebo v případě mého bratra na štaflích, ale to odbočujeme.

A obráceně to známe také, kdy víme, jak na to, ale tělo to prostě nezvládne. Třeba když sledujeme fakt pěknou hrušku na vrcholu, kam by naše tělo před deseti lety a dvaceti kily ještě vylezlo, takže víme jak na to, jen to už nejde, nebo při dobíhání vlaku, kdy hlava ví, že podlézt horkovod by bylo rychlejší, ale tělo návrh zamítne.

Takže nám kapánek schází ten vliv *Inteligence* na počet akcí.

A pak je tu ten druhý aspekt - zaokrouhlování. Teď je na čase uronit slzu nostalgie a zavzpomínat na **staré** dobré Dračí doupě, kde se jen sčítalo a odčítalo. Zaokrouhlování tam nemělo místo a v tom byla obrovská síla, protože hlava tak nebyla zatížena ani takovými výpočetními drobotinami a mohla se **naplno** věnovat zážitkům ze hry.

### Nemyslíš, zaplatíš

A tak nás trklo, že by počet akcí mohl být roven *Inteligenci*. A hotovo.

- a co nulová a záporná *Inteligence*?
    - necháme každého provést alespoň jednu akci, ať už má *Inteligenci* sebemenší
- takže prostý tvor nemá šanci si zvýšit šance?
    - Paul nás v [márkách](https://paper.dropbox.com/doc/Marky-hrdinu-i-padouchu--AOfhhadcneHIdLCOjivQRmpbAQ-4WNOSwzOGzSDLguzneiHn) inspiroval *Taktikem*, který používá rozum tam, kde ostatní pouze smysly a z toho bychom chtěli udělat obenou *Dovednost*, která přidá *bojovou inteligenci*, tedy zvýší počet akcí
- a co body *Boje*, ty pořád ovlivňují počet akcí?
    - hmm, to budeme muset probrat

### Body boje a počet akcí

Původně jsme počet akcí přímo podřizovali **celkovým** bodům *Boje*. Přestože ji mohl body *Boje* přesouvat sem a tam, tak od začátku ti už diktovaly, kolik různých činností v jednom kole zvládneš. No, nezní to *úplně* pitomě, ale je to takové strojové, takové předem naplánované, takové... nepřirozené.

Teď, když jsme celé to zjišťování, kolik vlastně mám v tomhle kole akcí, zjedodušili na velikost *Inteligence*, tak bychom vliv *Boje* mohli zahodit, ne?
No, **pevný** počet akcí by asi *Boj* ovlivňovat neměl, protože sám pevný **není**, když můžeme s body *Boje* čachrovat jak při skořápkách, ale kde není *Boj*, neměla by být ani akce, jak jsme si ukázali na případech schopnější mysli než těla, takže?

Takže můžeme oprášit jeden z nápadů v [původním návrhu *Boje*](2018-08-10-boj.md) a říct, že:

- jedna akce potřebuje alespoň jeden bod *Boje*
    - to neplatí pouze pro automatickou činnost, jakou je třeba [*Úhyb*](2018-09-19-uhyb.md)
- akcí můžeš provést kolik chceš, pokud na to máš body *Boje* a nově také *Inteligenci*
    - s tím že každá akce stojí šest nebo tři body *Boje*, podle toho, jestli vyžaduje plné nebo volné soustředění a pokud použiješ méně bodů *Boje*, budeš mít k akci postihy
- pokud nemáš **žádné** body *Boje*, tak nemůžeš dělat žádnou běžnou, vědomou akci, ale pořád můžeš udělat nějakou automatickou
    - to je změna oproti původnímu návrhu, kdy bez energie na běžnou akci nešlo provést ani automatickou

Tím se nám i pěkně oddělily běžné akce a automatické, kdy je více znát, že běžné akce vyžadují **vědomou** snahu (tedy body *Boje*).

A co omezení bodů *Boje*, které lze přesouvat? To necháme prostě na šesti jako předtím? Žádná vlastnost nám to neovlivní?

### Zručný přesun bodů *Boje*

Vrtá nám hlavou tedy ještě jedna věc, když *Inteligence* ovlivňuje počet akcí, které za kolo duševně zvládnu, tak co ovlivňuje počet bodů *Boje*, které mohu mezi akcemi přesunout?

Kdybychom se bavili pouze o těle, tak můžeme říci, že důraz na jednu akci a odfláknutí druhé závisí na naší *Obratnosti*. Jenže, trochu větší důraz a trochu menší důraz... není to spíš o citu než o mrštnosti? Že by *Zručnost*? Nebo rovnou *Smysly*?
Kdyby to byly *Smysly*, co nám umožňují citlivě rozprostřít energii mezi jednotlivé akce, tak, jak **chceme**, tak bychom museli taky říct, které z mnoha smyslů to jsou. Sluch? Zrak? Hmat? Všechny dohromady? A nejsou náhodou všechny dohromady *Zručnost*? Necháme to tedy na *Zručnosti*... počet bodů *Boje*, které můžeš přesouvat mezi akcemi, by **mohla** ovlivňovat *Zručnost*

Ovšem jen o těle se se nebavíme, když jsme přijali *Inteligenci* jako ukazatel počtu akcí, které zvládnu provést. 