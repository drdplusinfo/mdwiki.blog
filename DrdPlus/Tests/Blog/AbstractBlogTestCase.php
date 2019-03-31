<?php
declare(strict_types=1);

namespace DrdPlus\Tests\Blog;

use PHPUnit\Framework\TestCase;

abstract class BlogTestCase extends TestCase
{
    private static $fileContents = [];
    protected const CZECH_DATE_FORMAT = 'j. n. Y';

    /**
     * @return array|string[]
     */
    protected function getArticlesFullPaths(): array
    {
        static $articlesFullPaths;
        if ($articlesFullPaths === null) {
            $articles = $this->getFilesFromDir(__DIR__ . '/../../../clanky');
            self::assertNotEmpty($articles);
            $articlesFullPaths = \array_map(
                function (string $article) {
                    return __DIR__ . '/../../../clanky/' . $article;
                },
                $articles
            );
        }
        return $articlesFullPaths;
    }

    /**
     * @return array|string[]
     */
    protected function getArticlesBasePaths(): array
    {
        static $articlesBasePaths;
        if ($articlesBasePaths === null) {
            $articlesBasePaths = array_map(
                function (string $articlePath) {
                    return basename($articlePath);
                },
                $this->getArticlesFullPaths()
            );
        }
        return $articlesBasePaths;
    }

    /**
     * @return array|string[]
     */
    protected function getArticlesPaths(): array
    {
        static $articlesPaths;
        if ($articlesPaths === null) {
            $articlesPaths = \array_map(
                function (string $article) {
                    return 'clanky/' . $article;
                },
                $this->getArticlesBasePaths()
            );
        }
        return $articlesPaths;
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

    protected function getFileContent(string $filename): string
    {
        if ((self::$fileContents[$filename] ?? null) === null) {
            self::assertFileExists($filename);
            $content = \file_get_contents($filename);
            self::assertInternalType('string', $content, 'Could not read ' . $filename);
            self::assertNotEmpty($content, 'Empty article ' . $filename);

            self::$fileContents[$filename] = $content;
        }

        return self::$fileContents[$filename];
    }

    /**
     * @param array $fileNames
     * @return array|string[]
     */
    protected function sortFileNamesDescending(array $fileNames): array
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

    protected function createDateFromFilename(string $filename): \DateTime
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

    protected function fetchTitleFromFile(string $filename): string
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

    protected function getDateInCzechFormat(\DateTimeInterface $dateTime): string
    {
        return $dateTime->format(self::CZECH_DATE_FORMAT);
    }

    protected function getHeadingsFromArticle(string $articleFullPath): array
    {
        static $headings = [];
        if (($headings[$articleFullPath] ?? null) === null) {
            $content = $this->getFileContent($articleFullPath);
            \preg_match_all('~(^|[\n\r])#+\s+(?<headings>[^\n\r]+)~u', $content, $matches);
            $headings[$articleFullPath] = $matches['headings'];
        }
        return $headings[$articleFullPath];
    }

    protected function getArticleFullPath(string $articleBasePath): string
    {
        return __DIR__ . '/../../../clanky/' . $articleBasePath;
    }
}