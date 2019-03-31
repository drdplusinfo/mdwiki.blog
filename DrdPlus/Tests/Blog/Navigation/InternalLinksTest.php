<?php
declare(strict_types=1);

namespace DrdPlus\Tests\Blog\Navigation;

use DrdPlus\Tests\Blog\BlogTestCase;

class InternalLinksTest extends BlogTestCase
{
    /**
     * @test
     */
    public function Every_link_to_an_article_is_valid(): void
    {
        foreach ($this->getInternalLinks() as $sourceArticle => $articleInternalLinks) {
            foreach ($articleInternalLinks as $internalLink) {
                self::assertSame(
                    1,
                    preg_match('~(?<targetArticle>^\d[^#]+)#*(?<fragment>.*)~', $internalLink, $matches),
                    sprintf('Invalid format of internal link (%s) taken from article %s', $internalLink, basename($sourceArticle))
                );
                $targetArticle = $matches['targetArticle'];
                $fragment = $matches['fragment'];
                self::assertNotEmpty(
                    $targetArticle,
                    sprintf('No article name found in internal link (%s) taken from article %s', $internalLink, basename($sourceArticle))
                );
                self::assertContains(
                    $targetArticle,
                    $this->getArticlesBasePaths(),
                    \sprintf(
                        'No article file matches internal link (%s) taken from article %s, articles are %s',
                        $internalLink,
                        basename($sourceArticle),
                        \json_encode($this->getArticlesBasePaths(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
                    )
                );
                if ($fragment) {
                    $headings = $this->getHeadingsFromArticle($this->getArticleFullPath($targetArticle));
                    $anchors = $this->assembleAnchorsFromHeadings($headings);
                    self::assertContains(
                        $fragment,
                        $anchors,
                        \sprintf(
                            'Fragment #%s taken from article %s points to a non-existing heading in article %s',
                            $fragment,
                            basename($sourceArticle),
                            $targetArticle
                        )
                    );
                }
            }
        }
    }

    private function assembleAnchorsFromHeadings(array $headings): array
    {
        return \array_map(function (string $heading) {
            return \str_replace(' ', '_', $heading);
        }, $headings);
    }

    /**
     * @return array|string[]
     */
    private function getInternalLinks(): array
    {
        static $internalLinks = [];
        if (!$internalLinks) {
            foreach ($this->getArticlesFullPaths() as $articleFullPath) {
                $content = $this->getFileContent($articleFullPath);
                if (\preg_match_all('~\][(](?<links>\d+[^)]+)~', $content, $matches)) {
                    $internalLinks[$articleFullPath] = \array_unique($matches['links']);
                }
            }
        }
        self::assertGreaterThan(0, count($internalLinks), 'No internal links found');
        return $internalLinks;
    }

    /**
     * @test
     */
    public function Every_local_anchor_points_to_existing_heading()
    {
        foreach ($this->getLocalAnchors() as $articleFullPath => $articleLocalAnchors) {
            $headings = $this->getHeadingsFromArticle($articleFullPath);
            $determinedLocalAnchors = $this->assembleAnchorsFromHeadings($headings);
            $unknownLocalAnchors = \array_diff($articleLocalAnchors, $determinedLocalAnchors);
            self::assertSame(
                [],
                $unknownLocalAnchors,
                sprintf('Some local anchors from article %s point to unknown headings', basename($articleFullPath))
            );
        }
    }

    /**
     * @return array|string[]
     */
    private function getLocalAnchors(): array
    {
        static $localAnchors = [];
        if (!$localAnchors) {
            foreach ($this->getArticlesFullPaths() as $articleFullPath) {
                $content = $this->getFileContent($articleFullPath);
                if (\preg_match_all('~\][(]#+(?<anchors>[^)]+)~', $content, $matches)) {
                    $localAnchors[$articleFullPath] = array_unique($matches['anchors']);
                }
            }
        }
        self::assertGreaterThan(0, count($localAnchors), 'No local anchors found');
        return $localAnchors;
    }
}