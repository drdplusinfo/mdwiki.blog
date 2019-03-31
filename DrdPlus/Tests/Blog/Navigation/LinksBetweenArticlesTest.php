<?php
declare(strict_types=1);

namespace DrdPlus\Tests\Blog\Navigation;

use DrdPlus\Tests\Blog\BlogTestCase;

class LinksBetweenArticlesTest extends BlogTestCase
{
    /**
     * @test
     */
    public function I_can_navigate_easily_between_previous_and_next_articles(): void
    {
        $articlePaths = $this->getArticlesFullPaths();
        $articlePaths = $this->sortFileNamesDescending($articlePaths);
        $articlePaths = \array_values($articlePaths); // to re-index numerically from zero
        $previousLink = '';
        $previousDate = '';
        $nextArticle = '';
        foreach ($articlePaths as $index => $articlePath) {
            $articleBaseName = \basename($articlePath);
            if ($previousLink) { // previous iteration reveals a link to previous article (articles are ordered from newest)
                self::assertSame(
                    $articleBaseName,
                    $previousLink,
                    'Invalid "previous" article in ' . $nextArticle
                );
                $previousDateEnglish = \DateTime::createFromFormat(self::CZECH_DATE_FORMAT, $previousDate)->format('Y-m-d');
                self::assertStringStartsWith(
                    $previousDateEnglish,
                    $previousLink,
                    "Linked previous article mentions different date than article file name in $nextArticle"
                );
            }
            $expectedPreviousArticlePath = $articlePaths[$index + 1] ?? null;
            $expectedNextArticlePath = $articlePaths[$index - 1] ?? null;
            [
                'previousName' => $previousName,
                'previousLink' => $previousLink,
                'previousDate' => $previousDate,
                'nextName' => $nextName,
                'nextLink' => $nextLink,
                'nextDate' => $nextDate,
            ] = $this->parseArticleLinksFromFile($articlePath, $expectedPreviousArticlePath, $expectedNextArticlePath);
            $expectedNavigation = [];
            $currentNavigation = [];
            if ($expectedPreviousArticlePath !== null) {
                /** @var string $expectedPreviousArticlePath */
                $expectedPreviousArticleDate = $this->getDateInCzechFormat($this->createDateFromFilename($expectedPreviousArticlePath));
                $expectedPreviousTitle = $this->sanitizeTitleForLink($this->fetchTitleFromFile($expectedPreviousArticlePath));
                $expectedPreviousArticlePathBasename = \basename($expectedPreviousArticlePath);
                $expectedNavigation[] = $this->assembleLinkToPreviousArticle(
                    $expectedPreviousArticleDate,
                    $expectedPreviousTitle,
                    $expectedPreviousArticlePathBasename
                );
                $currentNavigation[] = $this->assembleLinkToPreviousArticle($previousDate, $previousName, $previousLink);
            }
            if ($expectedNextArticlePath !== null) {
                /** @var string $expectedNextArticlePath */
                $expectedNextArticleDate = $this->getDateInCzechFormat($this->createDateFromFilename($expectedNextArticlePath));
                $expectedNextTitle = $this->sanitizeTitleForLink($this->fetchTitleFromFile($expectedNextArticlePath));
                $expectedNextArticlePathBasename = \basename($expectedNextArticlePath);
                $expectedNavigation[] = $this->assembleLinkToNextArticle(
                    $expectedNextArticleDate,
                    $expectedNextTitle,
                    $expectedNextArticlePathBasename
                );
                $currentNavigation[] = $this->assembleLinkToNextArticle($nextDate, $nextName, $nextLink);
            }
            $expectedNavigationString = $this->assembleExpectedNavigation($expectedNavigation);
            $currentNavigationString = $this->assembleExpectedNavigation($currentNavigation);
            self::assertSame(
                $expectedNavigationString,
                $currentNavigationString,
                'At the bottom of article ' . $articleBaseName . " expected navigation\n$expectedNavigationString"
            );
            $nextArticle = $articleBaseName; // articles are ordered from newest, so current is "next" in following iteration
        }
    }

    private function assembleExpectedNavigation(array $links): string
    {
        return "---\n\n" . \implode("\n", $links);
    }

    private function assembleLinkToPreviousArticle(string $date, string $title, string $link): string
    {
        return "- *předchozí [<< $date $title]($link)*";
    }

    private function assembleLinkToNextArticle(string $date, string $title, string $link): string
    {
        return "- *následující [>> $date $title]($link)*";
    }

    private function sanitizeTitleForLink(string $title): string
    {
        return \str_replace('*', '', $title);
    }

    private function parseArticleLinksFromFile(string $filename, ?string $expectedPreviousArticlePath, ?string $expectedNextArticlePath): array
    {
        $content = $this->getFileContent($filename);
        $delimiterRegexp = '(?<delimiter>[\n\r]+---[\n\r]+)';
        $previousRegexp = '- \*předchozí \[(?<previousArrows>(?:<<|>>)) (?<previousDate>\d{1,2}[.] \d{1,2}[.] \d{4}) (?<previousName>[^\]]+)\]\((?<previousLink>[^\)]+)\)\*';
        $nextRegexp = '- \*následující \[(?<nextArrows>(?:<<|>>)) (?<nextDate>\d{1,2}[.] \d{1,2}[.] \d{4}) (?<nextName>[^\]]+)\]\((?<nextLink>[^\)]+)\)\*';
        $previousFound = (bool)\preg_match("~{$delimiterRegexp}?{$previousRegexp}~u", $content, $previousMatches);
        $nextFound = (bool)\preg_match("~{$delimiterRegexp}?{$nextRegexp}~u", $content, $nextMatches);
        if ($expectedPreviousArticlePath !== null) {
            self::assertTrue(
                $previousFound,
                sprintf(
                    "Link to previous article is missing at the end of %s, should be\n%s",
                    $filename,
                    $expectedPreviousArticlePath
                        ? $this->assembleLinkToPreviousArticle(
                        $this->getDateInCzechFormat($this->createDateFromFilename($expectedPreviousArticlePath)),
                        $this->fetchTitleFromFile($expectedPreviousArticlePath),
                        basename($expectedPreviousArticlePath)
                    )
                        : "\nexpected something like\n- *předchozí [<< 15. 3. 2019 Představy minulosti - Mýty](2019-03-15-predstavy_minulosti_myty.md)*"
                )
            );
            self::assertSame('<<', $previousMatches['previousArrows'], 'Expected two backward arrows as a part of the link to the previous article at the end of ' . $filename);
        }
        if ($expectedNextArticlePath !== null) {
            self::assertTrue(
                $nextFound,
                sprintf(
                    "Link to next article is missing at the end of %s, should be\n%s",
                    $filename,
                    $expectedNextArticlePath
                        ? $this->assembleLinkToNextArticle(
                        $this->getDateInCzechFormat($this->createDateFromFilename($expectedNextArticlePath)),
                        $this->fetchTitleFromFile($expectedNextArticlePath),
                        basename($expectedNextArticlePath)
                    )
                        : "\nexpected something like\n- *následující [>> 15. 3. 2019 Představy minulosti - Mýty](2019-03-15-predstavy_minulosti_myty.md)*"
                )
            );
            self::assertSame('>>', $nextMatches['nextArrows'], 'Expected two forward arrows as a part of the link to the next article at the end of ' . $filename);
        }
        if ($previousMatches && $nextMatches) {
            self::assertGreaterThan(
                0,
                \preg_match("~{$delimiterRegexp}{$previousRegexp}[\n\r]+{$nextRegexp}~u", $content),
                'Link to previous article should precede link to next article'
            );
        } elseif ($previousMatches) {
            self::assertNotEmpty($previousMatches['delimiter'], 'Previous link is not delimited by horizontal rule in ' . \basename($filename));
        } elseif ($nextMatches) {
            self::assertNotEmpty($nextMatches['delimiter'], 'Next link is not delimited by horizontal rule in ' . \basename($filename));
        }
        $previousDate = $previousMatches['previousDate'] ?? '';
        if ($previousDate) {
            self::assertRegExp('~^\d{1,2}[.] \d{1,2}[.] \d{4}$~', $previousDate);
        }
        $nextDate = $nextMatches['nextDate'] ?? '';
        if ($nextDate) {
            self::assertRegExp('~^\d{1,2}[.] \d{1,2}[.] \d{4}$~', $nextDate);
        }

        return [
            'previousName' => $previousMatches['previousName'] ?? false,
            'previousDate' => $previousDate,
            'previousLink' => $previousMatches['previousLink'] ?? false,
            'nextName' => $nextMatches['nextName'] ?? false,
            'nextDate' => $nextDate,
            'nextLink' => $nextMatches['nextLink'] ?? false,
        ];
    }
}