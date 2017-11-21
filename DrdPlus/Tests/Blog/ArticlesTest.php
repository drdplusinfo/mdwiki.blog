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
        self::assertFileExists($index, 'Index file does not exist');
        $content = file_get_contents($index);
        self::assertNotEmpty($content);
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
        $sortedIndexAnchors = $indexAnchors;
        uasort($sortedIndexAnchors, function (string $someName, string $anotherName) {
            $someName = basename($someName);
            $anotherName = basename($anotherName);
            $someDate = $this->createDateFromFilename($someName);
            $anotherDate = $this->createDateFromFilename($anotherName);

            return $anotherDate <=> $someDate; // descending
        });
        self::assertSame($indexAnchors, $sortedIndexAnchors, 'Articles are not sorted from newest to oldest in index');
    }

    private function createDateFromFilename(string $filename): \DateTime
    {
        $basename = \basename($filename);
        self::assertGreaterThan(
            0,
            preg_match('~^(?<months>\d+)-(?<days>\d+)-(?<years>\d+)-\D+~', $basename, $matches),
            'A file name does not start by [d]d-mm-YYYY format: ' . $basename
        );
        $date = \DateTime::createFromFormat('m-d-Y', "{$matches['months']}-{$matches['days']}-{$matches['years']}");
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

    /**
     * @test
     */
    public function Name_of_file_is_created_from_content_title()
    {
        foreach ($this->getArticles(true /* with full path */) as $article) {
            $content = file_get_contents($article);
            self::assertInternalType('string', $content, 'Could not read ' . $article);
            self::assertNotEmpty($content, 'Empty article ' . $article);
            self::assertGreaterThan(0, preg_match('~^#(?<title>[^#\n\r]+)~', $content, $matches), 'Missing title for article ' . $article);
            $title = $matches['title'];
            $expectedFilename = StringTools::toConstant($title);
            $basename = \basename($article, '.md');
            $filename = preg_replace('~^\d+-\d+-\d+-~', '', $basename);
            self::assertSame($expectedFilename, $filename);
        }
    }
}