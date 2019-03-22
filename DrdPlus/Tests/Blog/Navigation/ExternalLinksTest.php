<?php
declare(strict_types=1);

namespace DrdPlus\Tests\Blog\Navigation;

use DrdPlus\Tests\Blog\BlogTestCase;

class ExternalLinksTest extends BlogTestCase
{

    /**
     * @test
     */
    public function Links_to_altar_uses_https(): void
    {
        $linksToAltar = [];
        foreach ($this->getExternalLinks() as $link) {
            if (\strpos($link, 'altar.cz')) {
                $linksToAltar[] = $link;
            }
        }
        self::assertNotEmpty($linksToAltar, 'No links to Altar.cz have been found');
        $linksWithoutHttps = \array_filter($linksToAltar, function (string $linkToAltar) {
            return \strpos($linkToAltar, 'https') !== 0;
        });

        self::assertEmpty(
            $linksWithoutHttps,
            "Every link to Altar.cz should be via https: \n"
            . \implode("\n", $linksWithoutHttps)
        );
    }

    /**
     * @test
     */
    public function Links_to_rules_are_public(): void
    {
        $linksToRules = [];
        foreach ($this->getExternalLinks() as $link) {
            if (\strpos($link, '.drdplus.')) {
                $linksToRules[] = $link;
            }
        }
        self::assertNotEmpty($linksToRules, 'No links to rules have been found');
        $localLinks = \array_filter($linksToRules, function (string $linkToRules) {
            return \strpos($linkToRules, 'https') !== 0 || \strpos($linkToRules, 'drdplus.info') === false;
        });

        self::assertEmpty(
            $localLinks,
            "Every link to drdplus.info should leads to drdplus.info using https:\n"
            . \implode("\n", $localLinks) . "\n"
            . "You can use\n"
            . 'sed --in-place --regexp-extended --expression=\'s~http://([^.]+[.]drdplus)[.]loc(:[0-9]+)?/~https://\1.info/?trial=1~g\' clanky/*.md'
        );
    }

    /**
     * @test
     */
    public function Links_to_private_rules_passes_by_trial(): void
    {
        $linksToProtectedRules = [];
        $regexpWithNonVersionedLinks = '~https://(?:' . \implode('|', $this->pregQuoteAll($this->getNonProtectedSubDomains(), '~')) . ')[.]drdplus[.]info~';
        foreach ($this->getExternalLinks() as $link) {
            if (\strpos($link, '.drdplus.info') && !\preg_match('~[.]drdplus[.]info/(?:images|css|js)/~', $link) && !\preg_match($regexpWithNonVersionedLinks, $link)) {
                $linksToProtectedRules[] = $link;
            }
        }
        self::assertNotEmpty($linksToProtectedRules, 'No links to private rules have been found');
        $linksWithoutTrialPassing = \array_filter($linksToProtectedRules, function (string $linkToProtectedRules) {
            return !\preg_match('~([?]|&)trial=1~', $linkToProtectedRules);
        });

        self::assertEmpty(
            $linksWithoutTrialPassing,
            "Every link to private rules should have query part trial=1.0\n"
            . \implode("\n", $linksWithoutTrialPassing)
        );
    }

    private function pregQuoteAll(array $values, string $delimiter): array
    {
        $quoted = [];
        foreach ($values as $value) {
            $quoted[] = \preg_quote($value, $delimiter);
        }

        return $quoted;
    }

    private function getNonProtectedSubDomains(): array
    {
        return ['www', 'blog', 'pribeh', 'pribeh.bestiar', 'pad', 'boj', 'niceni', 'formule.theurg'];
    }

    /**
     * @return array|string[]
     */
    private function getExternalLinks(): array
    {
        static $externalLinks = [];
        if (!$externalLinks) {
            $content = '';
            foreach ($this->getArticlesFullPaths() as $article) {
                $content .= $this->getFileContent($article);
            }
            self::assertGreaterThan(
                0,
                \preg_match_all('~[(](?<links>https?://[^)]+)~', $content, $matches),
                'No external links found'
            );
            $externalLinks = \array_unique($matches['links']);
        }

        return $externalLinks;
    }

    /**
     * @test
     */
    public function I_can_use_very_link_to_altar_without_further_redirection(): void
    {
        foreach ($this->getArticlesFullPaths() as $articleFile) {
            $content = $this->getFileContent($articleFile);
            \preg_match_all('~(?<link>(?:[[:alpha:]]+:)?//(?:www[.])?altar[.]cz)~', $content, $matches);
            foreach ($matches['link'] as $link) {
                self::assertSame('https://www.altar.cz', $link, 'There is a non-optimal link to Altar in article ' . \basename($articleFile));
            }
        }
    }

    /**
     * @test
     */
    public function Links_to_drd2_do_not_uses_invalid_https(): void
    {
        $linksToDrd2 = [];
        foreach ($this->getExternalLinks() as $link) {
            if (\strpos($link, '.drd2.cz')) {
                $linksToDrd2[] = $link;
            }
        }
        self::assertNotEmpty($linksToDrd2, 'No links to drd2.cz has been found');
        $linksWithHttps = \array_filter($linksToDrd2, function (string $linkToDrd2) {
            return \strpos($linkToDrd2, 'https') !== false;
        });

        self::assertEmpty(
            $linksWithHttps,
            "Links to drd2.cz should not use https as the certificate is not valid=\n"
            . \implode("\n", $linksWithHttps)
        );
    }

}