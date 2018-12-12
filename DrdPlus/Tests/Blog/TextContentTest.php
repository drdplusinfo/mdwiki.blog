<?php
declare(strict_types=1);

namespace DrdPlus\Tests\Blog;

class TextContentTest extends AbstractBlogTestCase
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
            \preg_match_all('~\W(\w{4,})\s+\1\W~u', $content, $sameWords);
            $fileBaseName = basename($articleFile);
            if ($fileBaseName === '2018-08-10-boj.md') {
                self::assertSame(' Plus Plus*', $sameWords[0][0] ?? '', 'Expected two same words in sequence in fight article');
                unset($sameWords[0][0]);
            }
            self::assertCount(0, $sameWords[0], $fileBaseName . "\n" . var_export($sameWords[0], true));
        }
    }
}