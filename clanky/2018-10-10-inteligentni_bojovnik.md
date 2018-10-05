# Inteligentní bojovník

*10. 10. 2018*

> Inteligence má mnoho podob, pro hlupáky neviditelných

Při rozsáhlém [zkoumání, pitvání a nakonec i úpravách *Boje*](2018-08-10-boj.md) jsme mimo jiné došli k tomu, že

- *Boj* bude vycházet pouze z *Obratnosti*
- počet možných akcí v jednom kole je ovlivněn pouze *Bojem*
- body *Boje* lze, v rámci jednoho kola, přelévat mezi akcemi jak je libo

A trochu se nám to zatím rozleželo.
S tou *Obratností* se nám to pořád líbí, protože to je jednoduché a dává nám to smysl, ovšem jinak to už máme s počtem akcí a přesouváním bodů *Boje*. 

## Zkrátka inteligence

V návrhu *Boje* jsme chtěli mít počet akcí podle bodů *Boje*, což zní celkem jednoduše, pro úplnost si pravidla pro počet akcí ještě zopakujeme:

- máš tolik akcí, kolik máš bodů *Boje* vydělených šesti, zaokrouhleno nahoru
    - třeba s *Bojem* 7 bys měl dvě akce, protože 7 / 6 = 1.16666..., zaokrouhleno nahoru jsou 2
- do těchto akcí se počtem zahrnují i akce s volným soustředěním
    - v našem příkladu se dvěma akcemi můžeš prosvést dvě akce s plným soustředěním, nebo dvě s volným soustředěním, nebo jednu s plným a jednu s volným soustředěním
    - rozdíl oproti akci s plným soustředěním je pak v tom, že lze beztrestně provádět dvě akce s volným soustředěním zároveň
- automatické činnosti lze provádět zároveň s jakoukoli jinou akcí, ale celkem jich nelze provést víc, než kolik umožnily body *Boje*
    - což v našem příkladu znamená maximálně dvě automatické činnosti během příkladového kola
- na akci s plným soustředěním, což je většina, běžně potřebuješ 6 bodů *Boje*
- na akci s volným soustředěním běžně potřebuješ 3 body *Boje*
- na automatickou činnost nepotřebuješ žádné body *Boje*
- mezi akcemi můžeš body *Boje* přesouvat
    - za každý bod *Boje* **navíc**, který jsi na akci použil, máš k akci bonus +1
    - za každý **chybějící** bod *Boje* máš k akci postih -1

## TODO

- každá akce, za kterou zaplatím od 1 do 3 bodů boje je s volným soustředěním?
- každá akce, za kterou nezaplatím žádné body Boje je automatická činnost?
- každá akce, za kterou zaplatím 4 a více bodů Boje, je s plným soustředěním?

To co nám vadí, je závislost počtu akcí **pouze** na *Obratnosti*. Několikrát jsme byli v životní situaci, kdy jsme zůstali zkoprněle civět, či jsme se zmohli ledva na opatrný pohyb, zatímco ostatní na nás hulákali *ať něco děláme, sakra*! Prostě nám to v tu chvíli mozek nepobral, ať už na nohejbale, na křižovatce, nebo v případě mého bratra na štaflích, ale to odbočujeme.

A obráceně to známe také, kdy víme, jak na to, ale tělo to prostě nezvládne. Třeba když sledujeme fakt pěknou hrušku na vrcholu, kam by naše tělo před deseti lety a dvaceti kily ještě vylezlo, takže víme jak na to, jen to už nejde, nebo při dobíhání vlaku, kdy hlava ví, že podlézt horkovod by bylo rychlejší, ale tělo návrh zamítne.

Takže nám kapánek schází ten vliv *Inteligence* na počet akcí.

A pak je tu ten druhý aspekt - zaokrouhlování. Teď je na čase uronit slzu nostalgie a zavzpomínat na **staré** dobré Dračí doupě, kde se jen sčítalo a odčítalo. Zaokrouhlování tam nemělo místo a v tom byla obrovská síla, protože hlava tak nebyla zatížena ani takovými výpočetními drobotinami a mohla se **naplno** věnovat zážitkům ze hry.

### CO zvládneš, to zvládneš

A tak nás trklo, že by počet akcí mohl být roven *Inteligenci*. A hotovo.
