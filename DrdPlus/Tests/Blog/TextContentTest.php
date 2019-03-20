<?php
declare(strict_types=1);

namespace DrdPlus\Tests\Blog;

class TextContentTest extends BlogTestCase
{

    /**
     * @test
     */
    public function All_todos_are_solved(): void
    {
        foreach ($this->getArticlesWithFullPath() as $articleFile) {
            $content = $this->getFileContent($articleFile);
            self::assertFalse(
                \stripos($content, 'TODO'),
                'There are some unsolved TODOs in ' . \basename($articleFile)
            );
        }
    }

    /**
     * @test
     */
    public function No_duplicated_word_follow_self(): void
    {
        foreach ($this->getArticlesWithFullPath() as $articleFile) {
            $content = $this->getFileContent($articleFile);
            \preg_match_all('~[\W](\w{4,})\s+\1\W~u', $content, $sameWords);
            $fileBaseName = basename($articleFile);
            if ($fileBaseName === '2018-08-10-boj.md') {
                self::assertSame(' Plus Plus*', $sameWords[0][0] ?? '', 'Expected two same words in sequence in fight article');
                unset($sameWords[0][0]);
            }
            self::assertCount(0, $sameWords[0], $fileBaseName . "\n" . var_export($sameWords[0], true));
        }
    }

    /**
     * @test
     */
    public function Headings_are_unique(): void
    {
        foreach ($this->getArticlesWithFullPath() as $articleFile) {
            $content = $this->getFileContent($articleFile);
            \preg_match_all('~(^|[\n\r])#+(?<headings>[^\n\r]+)~u', $content, $matches);
            $headings = $matches['headings'];
            $headingsCounts = \array_count_values($headings);
            self::assertSame(
                count($headingsCounts),
                count($headings),
                sprintf(
                    'Some headings are not unique in article %s: %s',
                    basename($articleFile),
                    \json_encode(
                        array_filter(
                            $headingsCounts,
                            function (int $count) {
                                return $count > 1;
                            }
                        ),
                        \JSON_UNESCAPED_UNICODE | \JSON_PRETTY_PRINT
                    )
                )
            );
        }
    }
}