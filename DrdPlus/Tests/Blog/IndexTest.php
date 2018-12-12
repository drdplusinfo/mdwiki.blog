<?php
declare(strict_types=1);

namespace DrdPlus\Tests\Blog;

class IndexTest extends AbstractBlogTestCase
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
}