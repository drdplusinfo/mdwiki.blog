# Během převodu pravidel do HTML jsem opravil pár drobností v PPH

12.8. 2017

V [PPH, Pravidlech pro hráče](https://pph.drdplus.info) jsem našel několik nesrovnalostí a chybějících údajů, které jsem v průběhu opravil:

*Všechny změny se týkají PPH verze 1.0, edice B*

### V některých vzorcích chybí vliv Atletiky

V PPH na straně 112 vpravo v kapitole Pohybová rychlost je vzorec pro její výpočet
> [Pohybová rychlost = Rch/2 + bonus podle druhu pohybu](https://pph.drdplus.info/#vypocet_pohybove_rychlosti)

ovšem Pohybovou rychlost ovlivňuje také Atletika, pokud se pohybuješ Během nebo Sprintem,
jak je uvedeno u Atletiky na straně 145 a po vzoru Maximálního nákladu
> [Maximální náklad = Sil + 21 [+ Atletika]](https://pph.drdplus.info/#vypocet_maximalniho_nakladu)

by vzorec měl upozorňovat na bonus z atletiky.

Vzorec pro Pohybovou rychlost jsem tedy rozšířil
> Pohybová rychlost = Rch/2 + bonus podle druhu pohybu [+ Atletika při běhu a sprintu]

---

Podobné je to s Délkou (výškou) skoku ze strany 119 v pravém sloupci, ke které se opět přičítá Atletika a opět to není
ve vzorci uvedeno
> Délka (výška) skoku = Rch/2 + bonus + 1k6

Atletiku jsem do vzorce proto přidal

> [Délka (výška) skoku = Rch/2 + bonus + 1k6 [+ Atletika]](https://pph.drdplus.info/#vypocet_delky_a_vysky_skoku)

---

A nakonec chybí zmínka o Atletice u výpočtu zranění z pádu či skoku na straně 119 vpravo
> Body zranění = τ(Síla zranění) − τ(Obr)

kde se Atletika přičítá k Obratnosti pro snížení výsledného zranění.

I tady jsem atletiku přidal
> [Body zranění = τ(Síla zranění) − τ(Obr [+ Atletika])](https://pph.drdplus.info/#vypocet_zraneni_pri_padu)

---

[Další drobné opravy jsem přidal 20.11. 2017 >>](2017-11-20-opravuji_dalsi_drobne_nejasnosti_v_pph.md)

---

- *předchozí [<< Dokončil jsem spojování příběhů z pravidel do jednoho](2017-08-11-dokoncil_jsem_spojovani_pribehu_z_pravidel_do_jednoho.md)*
- *následující [>> Bouchi zatím na veřejná pravidla neodpovídá, zkouším prostší dotaz](2017-11-11-bouchi_zatim_na_verejna_pravidla_neodpovida_zkousim_prostsi_dotaz.md)*