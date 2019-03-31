<?php
declare(strict_types=1);

namespace DrdPlus\Tests\Blog\Navigation;

use DrdPlus\Tests\Blog\BlogTestCase;
use Granam\String\StringTools;

class FileAndHeadingMatchTest extends BlogTestCase
{
    /**
     * @test
     */
    public function Name_of_file_is_created_from_content_title(): void
    {
        foreach ($this->getArticlesFullPaths() as $articleFile) {
            $content = $this->getFileContent($articleFile);
            self::assertGreaterThan(0, \preg_match('~^#(?<title>[^#\n\r]+)~', $content, $matches), 'Missing title for article ' . $articleFile);
            $title = $matches['title'];
            $expectedFilenameWithoutDate = StringTools::toConstantLikeValue($title);
            $fileBasename = \basename($articleFile, '.md');
            $filenameWithoutDate = \preg_replace('~^\d{4}-\d{2}-\d{2}-~', '', $fileBasename);
            self::assertSame($expectedFilenameWithoutDate, $filenameWithoutDate);
        }
    }
}