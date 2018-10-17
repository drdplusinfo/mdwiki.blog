<?php
declare(strict_types=1); // on PHP 7+ are standard PHP methods strict to types of given parameters

namespace DrdPlus\Tests\Blog;

use Granam\String\StringTools;
use PHPUnit\Framework\TestCase;

class ArticlesTest extends TestCase
{
    private $fileContents = [];

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
                return !\in_array($folder, ['..', '.', 'WIP', 'drakkar'], true);
            }
        );
        $relativeParentDir = '';
        if ($level > 0) {
            $relativeParentDir = \basename(\dirname($dir, $level));
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
    public function Name_fo_article_matches_across_index_list_and_title(): void
    {
        foreach ($this->getIndexAnchors() as $indexTitleWithDate => $filename) {
            $fileTitle = $this->fetchTitleFromFile($filename);
            $indexTitle = $this->removeDateFromTitle($indexTitleWithDate);
            if (\strpos($fileTitle, 'Představy minulosti') === 0) {
                self::assertRegExp(
                    '~^Představy minulosti - [*][^*]+[*]$~u',
                    $fileTitle,
                    "'Představy minulosti' subtitle name should be in cursive"
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
        foreach ($this->getArticlesWithFullPath() as $article) {
            $content = $this->getFileContent($article);
            self::assertGreaterThan(0, \preg_match('~^#(?<title>[^#\n\r]+)~', $content, $matches), 'Missing title for article ' . $article);
            $title = $matches['title'];
            $expectedFilenameWithoutDate = StringTools::toConstantLikeValue($title);
            $fileBasename = \basename($article, '.md');
            $filenameWithoutDate = \preg_replace('~^\d{4}-\d{2}-\d{2}-~', '', $fileBasename);
            self::assertSame($expectedFilenameWithoutDate, $filenameWithoutDate);
        }
    }

    private function getFileContent(string $filename): string
    {
        if (($this->fileContents[$filename] ?? null) === null) {
            self::assertFileExists($filename);
            $content = \file_get_contents($filename);
            self::assertInternalType('string', $content, 'Could not read ' . $filename);
            self::assertNotEmpty($content, 'Empty article ' . $filename);

            $this->fileContents[$filename] = $content;
        }

        return $this->fileContents[$filename];
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
            . \implode("\n", $localLinks)
        );
    }

    /**
     * @test
     */
    public function Links_to_versioned_rules_lead_to_version_one(): void
    {
        $linksToVersionedRules = [];
        $regexpWithNonVersionedLinks = '~https://(?:' . \implode('|', $this->pregQuoteAll($this->getNonVersionedSubDomains(), '~')) . ')[.]drdplus[.]info~';
        foreach ($this->getExternalLinks() as $link) {
            if (\strpos($link, '.drdplus.info') && !\preg_match('~[.]drdplus[.]info/(?:images|css|js)/~', $link) && !\preg_match($regexpWithNonVersionedLinks, $link)) {
                $linksToVersionedRules[] = $link;
            }
        }
        self::assertNotEmpty($linksToVersionedRules, 'No links to versioned rules have been found');
        $linksWithoutVersion = \array_filter($linksToVersionedRules, function (string $linkToVersionedRules) {
            return \strpos($linkToVersionedRules, 'version=1.0') === false;
        });

        self::assertEmpty(
            $linksWithoutVersion,
            "Every link to versioned rules should have query ?version=1.0\n"
            . \implode("\n", $linksWithoutVersion)
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

    private function getNonVersionedSubDomains(): array
    {
        return ['www', 'blog', 'pribeh', 'pad', 'boj', 'formule.theurg'];
    }

    /**
     * @test
     */
    public function Links_to_non_versioned_rules_have_no_version(): void
    {
        $linksToNonVersionedRules = [];
        $regexpWithNonVersionedLinks = '~https://(?:' . \implode('|', $this->pregQuoteAll($this->getNonVersionedSubDomains(), '~')) . ')[.]drdplus[.]info~';
        foreach ($this->getExternalLinks() as $link) {
            if (\strpos($link, '.drdplus.info') && \preg_match($regexpWithNonVersionedLinks, $link)) {
                $linksToNonVersionedRules[] = $link;
            }
        }
        self::assertNotEmpty($linksToNonVersionedRules, 'No links to non-versioned rules has been found');
        $linksWithVersion = \array_filter($linksToNonVersionedRules, function (string $linkToNonVersionedRules) {
            return \strpos($linkToNonVersionedRules, 'version=') !== false;
        });

        self::assertEmpty(
            $linksWithVersion,
            "Links to non-versioned rules should have not query ?version=\n"
            . \implode("\n", $linksWithVersion)
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
                \preg_match_all('~[(](?<links>https?://[^)]+)~', $content, $matches),
                'No external anchors found'
            );
            $externalAnchors = \array_unique($matches['links']);
        }

        return $externalAnchors;
    }

    /**
     * @test
     */
    public function I_can_use_very_link_to_altar_without_further_redirection(): void
    {
        foreach ($this->getArticlesWithFullPath() as $articleFile) {
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

    /**
     * @test
     */
    public function All_todos_are_solved(): void
    {
        foreach ($this->getArticlesWithFullPath() as $articleFile) {
            $content = $this->getFileContent($articleFile);
            self::assertNotContains(
                'TODO',
                $content,
                'There are some unsolved TODOs in ' . \basename($articleFile),
                true // ignore case
            );
        }
    }
}