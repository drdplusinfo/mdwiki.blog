<?php
declare(strict_types=1);

namespace DrdPlus\Tests\Blog;

use PHPUnit\Framework\TestCase;

abstract class BlogTestCase extends TestCase
{
    private static $fileContents = [];

    /**
     * @return array|string[]
     */
    protected function getArticlesWithFullPath(): array
    {
        return $this->getArticles(true);
    }

    /**
     * @param bool $withFullPath
     * @return array|string[]
     */
    protected function getArticles(bool $withFullPath = false): array
    {
        $articles = $this->getFilesFromDir(__DIR__ . '/../../../clanky');
        self::assertNotEmpty($articles);

        return \array_map(function (string $article) use ($withFullPath) {
            return $withFullPath
                ? __DIR__ . '/../../../clanky/' . $article
                : 'clanky/' . $article;
        }, $articles);
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
}