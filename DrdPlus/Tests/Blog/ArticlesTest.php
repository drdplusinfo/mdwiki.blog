<?php
declare(strict_types=1); // on PHP 7+ are standard PHP methods strict to types of given parameters

namespace DrdPlus\Tests\Blog;

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
     * @return array|string[]
     */
    private function getArticles(): array
    {
        $articleFiles = scandir(__DIR__ . '/../../../clanky', SCANDIR_SORT_NONE);
        self::assertNotEmpty($articleFiles);
        $articles = array_filter(
            $articleFiles,
            function (string $article) {
                return $article !== '..' && $article !== '.';
            }
        );

        return array_map(function (string $article) {
            return 'clanky/' . $article;
        }, $articles);
    }
}