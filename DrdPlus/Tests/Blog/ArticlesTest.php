<?php
declare(strict_types=1); // on PHP 7+ are standard PHP methods strict to types of given parameters

namespace DrdPlus\Tests\Blog;

use Granam\String\StringTools;
use PHPUnit\Framework\TestCase;

class ArticlesTest extends TestCase
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
     * @param bool $withFullPath
     * @return array|string[]
     */
    private function getArticles(bool $withFullPath = false): array
    {
        $articles = $this->getFilesFromDir(__DIR__ . '/../../../clanky');
        self::assertNotEmpty($articles);

        return \array_map(function (string $article) use ($withFullPath) {
            return $withFullPath
                ? __DIR__ . '/../../../clanky/' . $article
                : 'clanky/' . $article;
        }, $articles);
    }

    private function getFilesFromDir(string $dir, int $level = 0): array
    {
        $folders = \scandir($dir, SCANDIR_SORT_NONE);
        $folders = \array_filter(
            $folders,
            function (string $folder) {
                return $folder !== '..' && $folder !== '.';
            }
        );
        $relativeParentDir = '';
        if ($level > 0) {
            $relativeParentDir = \dirname($dir, $level);
        }
        $files = [];
        foreach ($folders as $folder) {
            if (\is_dir($dir . '/' . $folder)) {
                foreach ($this->getFilesFromDir($dir . '/' . $folder, $level + 1) as $fileFromSubDir) {
                    if ($relativeParentDir !== '') {
                        $fileFromSubDir = $relativeParentDir . '/' . $fileFromSubDir;
                    }
                    $files[] = $fileFromSubDir;
                }
            } else {
                if ($relativeParentDir !== '') {
                    $folder = $relativeParentDir . '/' . $folder;
                }
                $files[] = $folder;
            }
        }

        return $files;
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
            \preg_match('~^(?<years>\d+)-(?<months>\d+)-(?<days>\d+)-\D+~', $basename, $matches),
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
    public function Name_fo_article_matches_across_index_list_and_title(): void
    {
        foreach ($this->getIndexAnchors() as $indexTitleWithDate => $filename) {
            $fileTitle = $this->fetchTitleFromFile($filename);
            $indexTitle = $this->removeDateFromTitle($indexTitleWithDate);
            self::assertEquals(
                $fileTitle,
                $indexTitle,
                "Article name in index list '$indexTitle' does not match file title '$fileTitle' from file $filename"
            );
        }
    }

    private function removeDateFromTitle(string $title): string
    {
        return \preg_replace('~^\d+\.\d+\.\s+\d+\s+~', '', $title);
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

    /**
     * @return array|string[]
     */
    private function getArticlesWithFullPath(): array
    {
        return $this->getArticles(true);
    }

    private function createDateFromTitle(string $title): \DateTime
    {
        self::assertGreaterThan(
            0,
            \preg_match('~^(?<days>\d+)\.(?<months>\d+)\. (?<years>\d+) \D+~', $title, $matches),
            'A title does not start by [d]d.mm. YYYY format: ' . $title
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
            \preg_match('~^#[^#\n\r]+(\n|\r)+(?<days>\d+)[.](?<months>\d+)[.] (?<years>\d+)(\n|\r)+~', $content, $matches),
            'Missing date in article ' . \mb_substr($content, 200)
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
        foreach ($this->getArticlesWithFullPath() as $article) {
            $content = $this->getFileContent($article);
            self::assertGreaterThan(0, \preg_match('~^#(?<title>[^#\n\r]+)~', $content, $matches), 'Missing title for article ' . $article);
            $title = $matches['title'];
            $expectedFilename = StringTools::toConstant($title);
            $basename = \basename($article, '.md');
            $filename = \preg_replace('~^\d+-\d+-\d+-~', '', $basename);
            self::assertSame($expectedFilename, $filename);
        }
    }

    private function getFileContent(string $filename): string
    {
        self::assertFileExists($filename);
        $content = \file_get_contents($filename);
        self::assertInternalType('string', $content, 'Could not read ' . $filename);
        self::assertNotEmpty($content, 'Empty article ' . $filename);

        return $content;
    }

    /**
     * @test
     */
    public function I_can_navigate_easily_between_previous_and_next_articles(): void
    {
        $articlePaths = $this->getArticlesWithFullPath();
        $articlePaths = $this->sortFileNamesDescending($articlePaths);
        $previousLink = '';
        $previousDate = '';
        $nextArticle = '';
        foreach ($articlePaths as $articlePath) {
            $articleBaseName = \basename($articlePath);
            if ($previousLink) { // previous iteration reveals a link to previous article (articles are ordered from newest)
                self::assertSame(
                    $articleBaseName,
                    $previousLink,
                    'Invalid "previous" article in ' . $nextArticle
                );
                $previousDateEnglish = \DateTime::createFromFormat('d.m. Y', $previousDate)->format('Y-m-d');
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
                'nextDate' => $nextDate
            ] = $this->parseArticleLinksFromFile($articlePath);
            if ($nextArticle) { // means previously next article
                self::assertNotEmpty(
                    $nextLink,
                    "Missing link to new article $nextArticle from " . \basename($articlePath)
                );
                self::assertSame(
                    \basename($nextArticle),
                    \basename($nextLink),
                    'Invalid "next" article in ' . $articleBaseName
                );
                $nextDateEnglish = \DateTime::createFromFormat('d.m. Y', $nextDate)->format('Y-m-d');
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
        $previousRegexp = '- \*předchozí \[<< (?<previousDate>\d+\.\d+\.\s*\d+) (?<previousName>[^\]]+)\]\((?<previousLink>[^\)]+)\)\*';
        $nextRegexp = '- \*následující \[>> (?<nextDate>\d+\.\d+\.\s*\d+) (?<nextName>[^\]]+)\]\((?<nextLink>[^\)]+)\)\*';
        self::assertGreaterThan(
            0,
            \preg_match("~{$delimiterRegexp}?{$previousRegexp}~u", $content, $previousMatches)
            + \preg_match("~{$delimiterRegexp}?{$nextRegexp}~u", $content, $nextMatches),
            'No previous nor next article links found in ' . \basename($filename)
            . ", expected something like \n- *předchozí [<< 1.2.2018 Foo](2018-02-01-bar.md)*\n"
            . "; last few lines of that file are:\n" . \mb_substr($content, \mb_strpos($content, '---') ?: \mb_strlen($content) - 200)
        );
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
            self::assertRegExp('~^\d{1,2}\.\d{1,2}\. \d{4}$~', $previousDate);
        }
        $nextDate = $nextMatches['nextDate'] ?? '';
        if ($nextDate) {
            self::assertRegExp('~^\d{1,2}\.\d{1,2}\. \d{4}$~', $nextDate);
        }

        return [
            'previousName' => $previousMatches['previousName'] ?? false,
            'previousDate' => $previousDate,
            'previousLink' => $previousMatches['previousLink'] ?? false,
            'nextName' => $nextMatches['nextName'] ?? false,
            'nextDate' => $nextDate,
            'nextLink' => $nextMatches['nextLink'] ?? false
        ];
    }

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
     * @return array|string[]
     */
    protected function getExternalLinks(): array
    {
        static $externalAnchors = [];
        if (!$externalAnchors) {
            $content = '';
            foreach ($this->getArticlesWithFullPath() as $article) {
                $content .= $this->getFileContent($article);
            }
            self::assertGreaterThan(
                0,
                \preg_match_all('~(?<links > https ?://[^\'"]+)~', $content, $matches),
                'No external anchors found'
            );
            $externalAnchors = $matches['links'];
        }

        return $externalAnchors;
    }
}