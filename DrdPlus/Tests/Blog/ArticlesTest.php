<?php
declare(strict_types=1); // on PHP 7+ are standard PHP methods strict to types of given parameters

namespace DrdPlus\Tests\Blog;

use Granam\String\StringTools;

class ArticlesTest extends BlogTestCase
{
    /**
     * @test
     */
    public function I_can_access_every_article_from_index(): void
    {
        $anchors = $this->getIndexAnchors();
        $articles = $this->getArticles();
        $missingAnchors = \array_diff($articles, $anchors);
        self::assertCount(0, $missingAnchors, "Some articles are not listed in index: \n" . \implode("\n", $missingAnchors));
        $missingArticles = \array_diff($anchors, $articles);
        self::assertCount(0, $missingArticles, "Some listed articles do not exist in fact: \n" . \implode("\n", $missingArticles));
    }

    private function getIndexAnchors(): array
    {
        $index = __DIR__ . '/../../../index.md';
        $content = $this->getFileContent($index);
        \preg_match_all('~\[(?<name>[^\]]+)]\((?<link>[^\)]+)\)~', $content, $matches);
        self::assertNotEmpty($matches, 'No links found in ' . $index);
        $anchors = [];
        /** @var array|string[][] $matches */
        foreach ($matches['name'] as $index => $name) {
            $anchors[$name] = $matches['link'][$index];
        }

        return $anchors;
    }

    /**
     * @test
     */
    public function List_of_articles_are_ordered_from_newest_to_oldest(): void
    {
        $indexAnchors = $this->getIndexAnchors();
        $sortedIndexAnchors = $this->sortFileNamesDescending($indexAnchors);

        self::assertSame($indexAnchors, $sortedIndexAnchors, 'Articles are not sorted from newest to oldest in index');
    }

    /**
     * @param array $fileNames
     * @return array|string[]
     */
    private function sortFileNamesDescending(array $fileNames): array
    {
        \uasort($fileNames, function (string $someName, string $anotherName) {
            $someName = \basename($someName);
            $anotherName = \basename($anotherName);
            $someDate = $this->createDateFromFilename($someName);
            $anotherDate = $this->createDateFromFilename($anotherName);

            return $anotherDate <=> $someDate; // descending
        });

        return $fileNames;
    }

    private function createDateFromFilename(string $filename): \DateTime
    {
        $basename = \basename($filename);
        self::assertGreaterThan(
            0,
            \preg_match('~^(?<years>\d{4})-(?<months>\d{2})-(?<days>\d{2})-\D+~', $basename, $matches),
            'A file name does not start by YYYY-mm-dd-\w+ format: ' . $basename
        );
        $date = \DateTime::createFromFormat('Y-m-d', "{$matches['years']}-{$matches['months']}-{$matches['days']}");
        self::assertInstanceOf(\DateTime::class, $date, 'Date has not been created from parts ' . \var_export($matches, true));
        $date->setTime(0, 0, 0);

        return $date;
    }

    /**
     * @test
     */
    public function Name_of_article_matches_across_index_list_and_title(): void
    {
        foreach ($this->getIndexAnchors() as $indexTitleWithDate => $filename) {
            $fileTitle = $this->fetchTitleFromFile($filename);
            $indexTitle = $this->removeDateFromTitle($indexTitleWithDate);
            if (\strpos($fileTitle, 'Představy minulosti') === 0) {
                self::assertRegExp(
                    '~^Představy minulosti - [*][^*]+[*]$~u',
                    $fileTitle,
                    "'Představy minulosti' subtitle name '" . \str_replace('Představy minulosti - ', '', $fileTitle) . "' should be in cursive"
                );
            }
            self::assertEquals(
                $fileTitle,
                $indexTitle,
                "Article name in index list '$indexTitle' does not match file title '$fileTitle' from file $filename"
            );
        }
    }

    private function removeDateFromTitle(string $title): string
    {
        return \preg_replace('~^[*]?\d{1,2}[.]\s*\d{1,2}[.]\s*\d+[*]?\s+~', '', $title);
    }

    private function fetchTitleFromFile(string $filename): string
    {
        $content = $this->getFileContent($filename);

        return $this->parseTitleFromContent($content);
    }

    private function parseTitleFromContent(string $content): string
    {
        self::assertSame(
            1,
            \preg_match('~^#\s*(?<title>[^#\n\r]+)~', $content, $matches),
            "No title has been found in content starting with: \n" . \mb_substr($content, 0, 100)
        );

        return \trim($matches['title']);
    }

    /**
     * @test
     */
    public function Date_of_articles_matches_across_title_and_filename(): void
    {
        foreach ($this->getIndexAnchors() as $title => $filename) {
            $fileDate = $this->createDateFromFilename($filename);
            $titleDate = $this->createDateFromTitle($title);
            self::assertEquals(
                $fileDate,
                $titleDate,
                "Date in index link name '$title' does not match date in filename $filename"
            );
        }
        foreach ($this->getArticlesWithFullPath() as $article) {
            $content = $this->getFileContent($article);
            $contentDate = $this->createDateFromContent($content);
            $fileDate = $this->createDateFromFilename($article);
            self::assertEquals(
                $fileDate,
                $contentDate,
                "Date in article content does not match with date in file name $article"
            );
        }
    }

    private function createDateFromTitle(string $title): \DateTime
    {
        self::assertGreaterThan(
            0,
            \preg_match('~^(?<days>\d{1,2})[.] (?<months>\d{1,2})[.] (?<years>\d{4}) \D+~', $title, $matches),
            "Title '$title' does not start by [d]d. [m]m. YYYY format"
        );
        $date = \DateTime::createFromFormat('m-d-Y', "{$matches['months']}-{$matches['days']}-{$matches['years']}");
        self::assertInstanceOf(\DateTime::class, $date, 'Date has not been created from parts ' . \var_export($matches, true));
        $date->setTime(0, 0, 0);

        return $date;
    }

    private function createDateFromContent(string $content): \DateTime
    {
        self::assertGreaterThan(
            0,
            \preg_match('~^#[^#\n\r]+(\n|\r)+[*](?<days>\d{1,2})[.] (?<months>\d{1,2})[.] (?<years>\d{4})[*](\n|\r)+~', $content, $matches),
            'Missing date in article ' . \mb_substr($content, 0, 200)
        );
        $contentDate = \DateTime::createFromFormat('m-d-Y', "{$matches['months']}-{$matches['days']}-{$matches['years']}");
        self::assertInstanceOf(\DateTime::class, $contentDate, 'Date has not been created from parts ' . \var_export($matches, true));
        $contentDate->setTime(0, 0, 0);

        return $contentDate;
    }

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
                $previousDateEnglish = \DateTime::createFromFormat('d. m. Y', $previousDate)->format('Y-m-d');
                self::assertStringStartsWith(
                    $previousDateEnglish,
                    $previousLink,
                    "Linked previous article mentions different date than article file name in $nextArticle"
                );
            }
            [
                'previousLink' => $previousLink,
                'previousDate' => $previousDate,
                'nextLink' => $nextLink,
                'nextDate' => $nextDate,
            ] = $this->parseArticleLinksFromFile($articlePath);
            $expectedPreviousArticlePath = $articlePaths[$index + 1] ?? null;
            $expectedNextArticlePath = $articlePaths[$index - 1] ?? null;
            $expectedNavigation = [];
            if ($expectedPreviousArticlePath !== null) {
                /** @var string $expectedPreviousArticlePath */
                $expectedPreviousTitle = $this->fetchTitleFromFile($expectedPreviousArticlePath);
                $expectedPreviousArticlePathBasename = \basename($expectedPreviousArticlePath);
                $expectedPreviousArticleDate = $this->createDateFromFilename($expectedPreviousArticlePath)->format('d. m. Y');
                $expectedNavigation[] = "- *předchozí [<< $expectedPreviousArticleDate $expectedPreviousTitle]($expectedPreviousArticlePathBasename)*";
            }
            if ($expectedNextArticlePath !== null) {
                /** @var string $expectedNextArticlePath */
                $expectedNextTitle = $this->fetchTitleFromFile($expectedNextArticlePath);
                $expectedNextArticlePathBasename = \basename($expectedNextArticlePath);
                $expectedNextArticleDate = $this->createDateFromFilename($expectedNextArticlePath)->format('d. m. Y');
                $expectedNavigation[] = "- *následující [>> $expectedNextArticleDate $expectedNextTitle]($expectedNextArticlePathBasename)*";
            }
            $expectedNavigationString = "---\n\n" . \implode("\n", $expectedNavigation);
            if ((!$previousLink || !$previousDate) && $expectedPreviousArticlePath) {
                self::fail('At the bottom of article ' . $articleBaseName . " expected navigation\n$expectedNavigationString");
            }
            if ((!$nextLink || !$nextDate) && $expectedNextArticlePath) {
                self::fail('At the bottom of article ' . $articleBaseName . " expected navigation\n$expectedNavigationString");
            }
            if ($nextArticle) { // means previously next article
                self::assertNotEmpty(
                    $nextLink,
                    "Missing link to new article $nextArticle at the end of " . \basename($articlePath)
                );
                self::assertSame(
                    $nextArticle,
                    $nextLink,
                    'Invalid "next" article in ' . $articleBaseName
                );
                $nextDateEnglish = \DateTime::createFromFormat('d. m. Y', $nextDate)->format('Y-m-d');
                self::assertStringStartsWith(
                    $nextDateEnglish,
                    \basename($nextArticle),
                    "Linked 'next' article uses different date than article file name in $articleBaseName"
                );
            }
            $nextArticle = $articleBaseName; // articles are ordered from newest, so current is "next" in following iteration
        }
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
            'previousName' => $previousMatches['previousName'] ?? false,
            'previousDate' => $previousDate,
            'previousLink' => $previousMatches['previousLink'] ?? false,
            'nextName' => $nextMatches['nextName'] ?? false,
            'nextDate' => $nextDate,
            'nextLink' => $nextMatches['nextLink'] ?? false,
        ];
    }
}