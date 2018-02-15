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
    public function I_can_access_every_article_from_index()
    {
        $anchors = $this->getIndexAnchors();
        $articles = $this->getArticles();
        $missingAnchors = array_diff($articles, $anchors);
        self::assertCount(0, $missingAnchors, "Some articles are not listed in index: \n" . implode("\n", $missingAnchors));
        $missingArticles = array_diff($anchors, $articles);
        self::assertCount(0, $missingArticles, "Some listed articles do not exist in fact: \n" . implode("\n", $missingArticles));
    }

    private function getIndexAnchors(): array
    {
        $index = __DIR__ . '/../../../index.md';
        $content = $this->getFileContent($index);
        preg_match_all('~\[(?<name>[^\]]+)]\((?<link>[^\)]+)\)~', $content, $matches);
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
        $articleFiles = scandir(__DIR__ . '/../../../clanky', SCANDIR_SORT_NONE);
        self::assertNotEmpty($articleFiles);
        $articles = array_filter(
            $articleFiles,
            function (string $article) {
                return $article !== '..' && $article !== '.';
            }
        );

        return array_map(function (string $article) use ($withFullPath) {
            return $withFullPath
                ? __DIR__ . '/../../../clanky/' . $article
                : 'clanky/' . $article;
        }, $articles);
    }

    /**
     * @test
     */
    public function List_of_articles_are_ordered_from_newest_to_oldest()
    {
        $indexAnchors = $this->getIndexAnchors();
        $sortedIndexAnchors = $this->sortFileNamesDescending($indexAnchors);

        self::assertSame($indexAnchors, $sortedIndexAnchors, 'Articles are not sorted from newest to oldest in index');
    }

    private function sortFileNamesDescending(array $fileNames): array
    {
        uasort($fileNames, function (string $someName, string $anotherName) {
            $someName = basename($someName);
            $anotherName = basename($anotherName);
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
            preg_match('~^(?<years>\d+)-(?<months>\d+)-(?<days>\d+)-\D+~', $basename, $matches),
            'A file name does not start by YYYY-mm-dd-\w+ format: ' . $basename
        );
        $date = \DateTime::createFromFormat('Y-m-d', "{$matches['years']}-{$matches['months']}-{$matches['days']}");
        self::assertInstanceOf(\DateTime::class, $date, 'Date has not been created from parts ' . var_export($matches, true));
        $date->setTime(0, 0, 0);

        return $date;
    }

    /**
     * @test
     */
    public function Date_of_articles_matches_across_title_and_filename()
    {
        foreach ($this->getIndexAnchors() as $title => $filename) {
            $fileDate = $this->createDateFromFilename($filename);
            $titleDate = $this->createDateFromTitle($title);
            self::assertEquals($fileDate, $titleDate, 'Date in title does not match date in filename');
        }
        foreach ($this->getArticles(true) as $article) {
            $content = $this->getFileContent($article);
            $contentDate = $this->createDateFromContent($content);
            $fileDate = $this->createDateFromFilename($article);
            self::assertEquals($fileDate, $contentDate, 'Date in article content does not match with date in file name');
        }
    }

    private function createDateFromTitle(string $title): \DateTime
    {
        self::assertGreaterThan(
            0,
            preg_match('~^(?<days>\d+).(?<months>\d+). (?<years>\d+) \D+~', $title, $matches),
            'A title does not start by [d]d.mm. YYYY format: ' . $title
        );
        $date = \DateTime::createFromFormat('m-d-Y', "{$matches['months']}-{$matches['days']}-{$matches['years']}");
        self::assertInstanceOf(\DateTime::class, $date, 'Date has not been created from parts ' . var_export($matches, true));
        $date->setTime(0, 0, 0);

        return $date;
    }

    private function createDateFromContent(string $content): \DateTime
    {
        self::assertGreaterThan(
            0,
            preg_match('~^#[^#\n\r]+(\n|\r)+(?<days>\d+)[.](?<months>\d+)[.] (?<years>\d+)(\n|\r)+~', $content, $matches),
            'Missing date in article ' . $content
        );
        $contentDate = \DateTime::createFromFormat('m-d-Y', "{$matches['months']}-{$matches['days']}-{$matches['years']}");
        self::assertInstanceOf(\DateTime::class, $contentDate, 'Date has not been created from parts ' . var_export($matches, true));
        $contentDate->setTime(0, 0, 0);

        return $contentDate;
    }

    /**
     * @test
     */
    public function Name_of_file_is_created_from_content_title()
    {
        foreach ($this->getArticles(true /* with full path */) as $article) {
            $content = $this->getFileContent($article);
            self::assertGreaterThan(0, preg_match('~^#(?<title>[^#\n\r]+)~', $content, $matches), 'Missing title for article ' . $article);
            $title = $matches['title'];
            $expectedFilename = StringTools::toConstant($title);
            $basename = \basename($article, '.md');
            $filename = preg_replace('~^\d+-\d+-\d+-~', '', $basename);
            self::assertSame($expectedFilename, $filename);
        }
    }

    private function getFileContent(string $filename): string
    {
        self::assertFileExists($filename);
        $content = file_get_contents($filename);
        self::assertInternalType('string', $content, 'Could not read ' . $filename);
        self::assertNotEmpty($content, 'Empty article ' . $filename);

        return $content;
    }

    /**
     * @test
     */
    public function I_can_navigate_easily_between_previous_and_next_articles()
    {
        $articlePaths = $this->getArticles(true);
        $articlePaths = $this->sortFileNamesDescending($articlePaths);
        $previousLink = false;
        $nextArticle = false;
        foreach ($articlePaths as $articlePath) {
            if ($previousLink) { // previous iteration reveals a link to previous article (articles are ordered from newest)
                self::assertSame(
                    \basename($articlePath),
                    $previousLink,
                    'Invalid "previous" article in ' . $nextArticle
                );
            }
            ['previousLink' => $previousLink, 'nextLink' => $nextLink] = $this->parseArticleLinksFromFile($articlePath);
            if ($nextArticle) { // means previously next article
                self::assertNotEmpty($nextLink, "Got new article $nextArticle, but no next link from $articlePath");
                self::assertSame(
                    \basename($nextArticle),
                    \basename($nextLink),
                    'Invalid "next" article in ' . \basename($articlePath)
                );
            }
            $nextArticle = \basename($articlePath); // articles are ordered from newest, so current is "next" in following iteration
        }
    }

    private function parseArticleLinksFromFile(string $filename): array
    {
        $content = $this->getFileContent($filename);
        $previousRegexp = '- \*předchozí \[<< (?<previousName>[^\]]+)\]\((?<previousLink>[^\)]+)\)\*';
        $nextRegexp = '- \*následující \[>> (?<nextName>[^\]]+)\]\((?<nextLink>[^\)]+)\)\*';
        $delimiterRegexp = '(?<delimiter>[\n\r]+---[\n\r]+)';
        self::assertGreaterThan(
            0,
            preg_match("~{$delimiterRegexp}?{$previousRegexp}~u", $content, $previousMatches)
            + preg_match("~{$delimiterRegexp}?{$nextRegexp}~u", $content, $nextMatches),
            'No previous nor next article links found in ' . basename($filename)
        );
        if ($previousMatches && $nextMatches) {
            self::assertGreaterThan(
                0,
                preg_match("~{$delimiterRegexp}{$previousRegexp}[\n\r]+{$nextRegexp}~u", $content),
                'Link to previous article should precede link to next article'
            );
        } elseif ($previousMatches) {
            self::assertNotEmpty($previousMatches['delimiter'], 'Previous link is not delimited by horizontal rule in ' . basename($filename));
        } elseif ($nextMatches) {
            self::assertNotEmpty($nextMatches['delimiter'], 'Next link is not delimited by horizontal rule in ' . basename($filename));
        }

        return [
            'previousName' => $previousMatches['previousName'] ?? false,
            'previousLink' => $previousMatches['previousLink'] ?? false,
            'nextName' => $nextMatches['nextName'] ?? false,
            'nextLink' => $nextMatches['nextLink'] ?? false
        ];
    }
}