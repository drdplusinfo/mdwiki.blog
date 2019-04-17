<?php
namespace DrdPlus\Tests\Blog;

class LastArticleDateTest extends BlogTestCase
{
    /**
     * @test
     */
    public function I_can_get_last_article_date()
    {
        $dates = [];
        foreach ($this->getArticlesFullPaths() as $articleFullPath) {
            $dates[] = $this->createDateFromFilename($articleFullPath);
        }
        /** @var \DateTime $expectedLastDate */
        $expectedLastDate = max($dates);
        $expectedLastDate->setTime(0, 0, 0);
        $lastArticleDateEncoded = file_get_contents('http://blog.drdplus.loc/last-article-date.php');
        self::assertNotEmpty($lastArticleDateEncoded);
        $lastArticleDateWrapped = json_decode($lastArticleDateEncoded, true);
        self::assertNotEmpty($lastArticleDateWrapped);
        $lastArticleDate = $lastArticleDateWrapped['last_article_date'] ?? null;
        self::assertNotEmpty($lastArticleDate);
        self::assertSame($expectedLastDate->format(DATE_ATOM), $lastArticleDate);
    }
}