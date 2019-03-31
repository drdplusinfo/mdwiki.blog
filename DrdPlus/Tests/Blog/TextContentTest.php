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
        foreach ($this->getArticlesFullPaths() as $articleFile) {
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
        foreach ($this->getArticlesFullPaths() as $articleFile) {
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
    public function Every_date_is_in_valid_format()
    {
        foreach ($this->getArticlesFullPaths() as $articleFile) {
            $content = $this->getFileContent($articleFile);
            \preg_match_all('~.*(?<date>\d+\s*[.]\s*\d+\s*[.]\s*\d+).*~', $content, $matches);
            foreach ($matches['date'] as $index => $date) {
                $row = $matches[0][$index];
                if ($row === '24.6.2002 n.l., Oltář' || $row === '23.1.2002 n.l., Oltář') {
                    continue;
                }
                self::assertRegExp(
                    '~\d{1,2}[.] \d{1,2}[.] \d{4}~',
                    $date,
                    sprintf('Row "%s" from article %s has a date in invalid format, got "%s", expected j. n. Y', $row, basename($articleFile), $date)
                );
                try {
                    \DateTime::createFromFormat('j. n. Y', $date);
                } catch (\Throwable $exception) {
                    self::fail($exception->getMessage());
                }
            }
        }
    }
}