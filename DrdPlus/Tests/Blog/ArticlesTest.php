<?php
declare(strict_types=1); // on PHP 7+ are standard PHP methods strict to types of given parameters

namespace DrdPlus\Tests\Blog;

use Granam\String\StringTools;

class ArticlesTest extends AbstractBlogTestCase
{

    /**
     * @test
     */
    public function Name_of_file_is_created_from_content_title(): void
    {
        foreach ($this->getArticlesWithFullPath() as $articleFile) {
            $content = $this->getFileContent($articleFile);
            self::assertGreaterThan(0, \preg_match('~^#(?<title>[^#\n\r]+)~', $content, $matches), 'Missing title for article ' . $articleFile);
            $title = $matches['title'];
            $expectedFilenameWithoutDate = StringTools::toConstantLikeValue($title);
            $fileBasename = \basename($articleFile, '.md');
            $filenameWithoutDate = \preg_replace('~^\d{4}-\d{2}-\d{2}-~', '', $fileBasename);
            self::assertSame($expectedFilenameWithoutDate, $filenameWithoutDate);
        }
    }

    /**
     * @test
     */
    public function I_can_navigate_easily_between_previous_and_next_articles(): void
    {
        $articlePaths = $this->getArticlesWithFullPath();
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
                $previousDateEnglish = \DateTime::createFromFormat('j. n. Y', $previousDate)->format('Y-m-d');
                self::assertStringStartsWith(
                    $previousDateEnglish,
                    $previousLink,
                    "Linked previous article mentions different date than article file name in $nextArticle"
                );
            }
            [
                'previousName' => $previousName,
                'previousLink' => $previousLink,
                'previousDate' => $previousDate,
                'nextName' => $nextName,
                'nextLink' => $nextLink,
                'nextDate' => $nextDate,
            ] = $this->parseArticleLinksFromFile($articlePath);
            $expectedPreviousArticlePath = $articlePaths[$index + 1] ?? null;
            $expectedNextArticlePath = $articlePaths[$index - 1] ?? null;
            $expectedNavigation = [];
            $currentNavigation = [];
            if ($expectedPreviousArticlePath !== null) {
                /** @var string $expectedPreviousArticlePath */
                $expectedPreviousArticleDate = $this->createDateFromFilename($expectedPreviousArticlePath)->format('j. n. Y');
                $expectedPreviousTitle = $this->sanitizeTitleForLink($this->fetchTitleFromFile($expectedPreviousArticlePath));
                $expectedPreviousArticlePathBasename = \basename($expectedPreviousArticlePath);
                $expectedNavigation[] = $this->assembleLinkToPreviousArticle(
                    $expectedPreviousArticleDate,
                    $expectedPreviousTitle,
                    $expectedPreviousArticlePathBasename
                );
                $currentNavigation[] = $this->assembleLinkToPreviousArticle($previousDate ?? '', $previousName ?? '', $previousLink ?? '');
            }
            if ($expectedNextArticlePath !== null) {
                /** @var string $expectedNextArticlePath */
                $expectedNextArticleDate = $this->createDateFromFilename($expectedNextArticlePath)->format('j. n. Y');
                $expectedNextTitle = $this->sanitizeTitleForLink($this->fetchTitleFromFile($expectedNextArticlePath));
                $expectedNextArticlePathBasename = \basename($expectedNextArticlePath);
                $expectedNavigation[] = $this->assembleLinkToNextArticle(
                    $expectedNextArticleDate,
                    $expectedNextTitle,
                    $expectedNextArticlePathBasename
                );
                $currentNavigation[] = $this->assembleLinkToNextArticle($nextDate ?? '', $nextName ?? '', $nextLink ?? '');
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

    private function parseArticleLinksFromFile(string $filename): array
    {
        $content = $this->getFileContent($filename);
        $delimiterRegexp = '(?<delimiter>[\n\r]+---[\n\r]+)';
        $previousRegexp = '- \*předchozí \[<< (?<previousDate>\d{1,2}[.] \d{1,2}[.] \d{4}) (?<previousName>[^\]]+)\]\((?<previousLink>[^\)]+)\)\*';
        $nextRegexp = '- \*následující \[>> (?<nextDate>\d{1,2}[.] \d{1,2}[.] \d{4}) (?<nextName>[^\]]+)\]\((?<nextLink>[^\)]+)\)\*';
        \preg_match("~{$delimiterRegexp}?{$previousRegexp}~u", $content, $previousMatches);
        \preg_match("~{$delimiterRegexp}?{$nextRegexp}~u", $content, $nextMatches);
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
            'previousName' => $previousMatches['previousName'] ?? null,
            'previousDate' => $previousDate,
            'previousLink' => $previousMatches['previousLink'] ?? null,
            'nextName' => $nextMatches['nextName'] ?? null,
            'nextDate' => $nextDate,
            'nextLink' => $nextMatches['nextLink'] ?? null,
        ];
    }
}