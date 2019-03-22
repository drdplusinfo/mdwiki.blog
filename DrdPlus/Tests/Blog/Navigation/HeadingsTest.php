<?php
declare(strict_types=1);

namespace DrdPlus\Tests\Blog\Navigation;

use DrdPlus\Tests\Blog\BlogTestCase;

class HeadingsTest extends BlogTestCase
{

    /**
     * @test
     */
    public function Headings_are_unique(): void
    {
        foreach ($this->getArticlesFullPaths() as $articleFile) {
            $headings = $this->getHeadingsFromArticle($articleFile);
            $headingsCounts = \array_count_values($headings);
            /** @noinspection PhpUnitTestsInspection */
            self::assertSame(
                count($headingsCounts),
                count($headings),
                sprintf(
                    'Some headings are not unique in article %s: %s',
                    basename($articleFile),
                    \json_encode(
                        array_filter(
                            $headingsCounts,
                            function (int $count) {
                                return $count > 1;
                            }
                        ),
                        \JSON_UNESCAPED_UNICODE | \JSON_PRETTY_PRINT
                    )
                )
            );
        }
    }

    /**
     * @test
     */
    public function Conclusion_heading_name_is_unified(): void
    {
        $articlesWithoutConclusion = [
            basename(__DIR__ . '/../../../clanky/2017-06-16-polozen_zakladni_kamen_pro_cely_pribeh_drd_na_jednom_miste.md'),
            basename(__DIR__ . '/../../../clanky/2017-08-02-ptam_se_bouchiho_z_altaru_zda_mohu_zverejnit_drd_pravidla.md'),
            basename(__DIR__ . '/../../../clanky/2017-08-10-altar_rozvazne_odpovida_ze_se_nad_verejnymi_pravidly_zamysli.md'),
            basename(__DIR__ . '/../../../clanky/2017-08-11-dokonceno_sjednocovani_pribehu_drd.md'),
            basename(__DIR__ . '/../../../clanky/2017-08-12-v_pph_ujasneny_nektere_vzorce_ve_kterych_chybela_zminka_o_atletice.md'),
            basename(__DIR__ . '/../../../clanky/2017-11-20-v_pph_zopakovano_ze_vyznacny_smysl_je_nepouzitelny_pri_automatickem_a_zbeznem_hledani.md'),
            basename(__DIR__ . '/../../../clanky/2017-11-11-bouchi_zatim_na_verejna_pravidla_neodpovida_zkousim_prostsi_dotaz.md'),
            basename(__DIR__ . '/../../../clanky/2018-01-02-na_web_jsem_prevedl_bestiar.md'),
            basename(__DIR__ . '/../../../clanky/2018-02-09-na_webu_jsou_vsechna_pravidla_a_co_ted.md'),
            basename(__DIR__ . '/../../../clanky/2018-02-16-vyskytla_se_nam_neviditelna_soutez.md'),
            basename(__DIR__ . '/../../../clanky/2018-03-10-technicky_milnik_zrychlili_jsme.md'),
            basename(__DIR__ . '/../../../clanky/2018-05-03-neviditelna_recenze.md'),
            basename(__DIR__ . '/../../../clanky/2018-05-16-kratky_pribeh_na_motivy_obalky_neviditelne_knihy.md'),
            basename(__DIR__ . '/../../../clanky/2018-07-02-sucha_pravidla_mokry_zatylek_a_hledani_pomoci.md'),
            basename(__DIR__ . '/../../../clanky/2018-08-10-boj.md'),
            basename(__DIR__ . '/../../../clanky/2018-09-03-velkej_fanousek.md'),
            basename(__DIR__ . '/../../../clanky/2018-09-19-uhyb.md'),
            basename(__DIR__ . '/../../../clanky/2018-10-03-co_chcete.md'),
        ];
        foreach ($this->getArticlesFullPaths() as $articleFile) {
            $headings = $this->getHeadingsFromArticle($articleFile);
            $conclusionHeadings = \array_filter($headings, function (string $heading) {
                return \strpos($heading, 'Závěr') === 0;
            });
            $conclusionHeading = \end($conclusionHeadings);
            $articleFileBaseName = basename($articleFile);
            if (\in_array($articleFileBaseName, $articlesWithoutConclusion, true)) {
                self::assertNotSame('Závěrem', $conclusionHeading, 'Conclusion is not expected in article ' . $articleFileBaseName);
                continue;
            }
            self::assertGreaterThan(0, count($conclusionHeadings), 'Expected some conclusion heading in article ' . $articleFileBaseName);
            self::assertCount(
                1,
                $conclusionHeadings,
                sprintf(
                    'Just a single conclusion heading expected in article %s, got %s',
                    $articleFileBaseName,
                    json_encode($conclusionHeadings, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE)
                )
            );
            self::assertSame('Závěrem', $conclusionHeading, 'Expected different conclusion heading in article ' . $articleFileBaseName);
        }
    }
}