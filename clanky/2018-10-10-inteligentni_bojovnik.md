# Inteligentní bojovník

*10. 10. 2018*

> Inteligence má mnoho podob, pro hluoáky neviditelných

Při rozsáhlém [zkoumání, pitvání a nakonec i úpravách *Boje*](2018-08-10-boj.md) jsme mimo jiné došli k tomu, že

- *Boj* bude vycházet pouze z *Obratnosti*
- počet možných akcí je ovlivněno pouze *Bojem*
- body *Boje* lze, v rámci jednoho kola, přelévat mezi akcemi jak je libo

A trochu se nám to zatím rozleželo.
S tou *Obratností* se nám to pořád líbí, protože to je jednoduché a dává nám to smysl, ovšem jinak to už máme s počtem akcí a přesouváním bodů *Boje*. 

## Zkrátka inteligence

V návrhu *Boje* jsme chtěli mít počet akcí podle bodů *Boje*, což zní celkem jednoduše, pro úplnost si pravidla pro počet akcí ještě zopakujeme:

- počet akcí je roven bodům *Boje* vydělenými šesti, zaokrouhleno nahoru
    - třeba *Boj* 7 by byly dvě akce, protože 7 / 6 = 1.16666..., zaokrouhleno nahoru jsou 2
- to platí i pro počet akcí s volným soustředěním
    - rozdíl oproti akci s plným soustředěním je pak v tom, že lze beztrestně provádět dvě akce s volným soustředěním zároveň
- automatické činnosti lze provádět zároveň s jakoukoli jinou akcí, ale celkem jich nelze provést víc, než kolik umožnily body *Boje*
    - což v našem příkladu znamená maximálně dvě automatické činnosti během příkladového kola

To co nám vadí, je přímá závislost počtu akcí na *Obratnosti*. Několikrát jsme byli v životní situaci, kdy jsme zůstali zkoprněle civět, nebo jsme se zmohli na opatrný pohyb, zatímco ostatní na nás hulákali ať něco děláme, sakra! Prostě nám to v tu chvíli mozek nepobral, ať už na nohejbale, na křižovatce, nebo v případě mého bratra na štaflích, ale to odpočujeme.

A obráceně to známe také, kdy víme, jak na to, ale tělo to prostě nezvládne. Třeba když sledujeme fakt pěknou hrušku na vrcholu, kam by naše tělo před deseti lety a dvacei kily ještě vylezlo, nebo při dobíhání vlaku, kdy hlava ví, že podlézt horkovod by bylo rychlejší, ale tělo námitku zamítne.

Takže nám kapánek schází ten vliv *Inteligence* na počet akcí.

A pak je tu ten druhý aspekt - zaokrouhlování. Teď je na čase uronit slzu nostalgie a zavzpomínat na staré Dračí doupě, 