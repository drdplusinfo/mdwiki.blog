<?php

namespace DrdPlus\Tests\Blog;

use PHPUnit\Framework\TestCase;

class AssetsTest extends TestCase
{
    /**
     * @test
     */
    public function Every_asset_is_loaded_vith_current_md5_as_version()
    {
        $indexHtmlContent = file_get_contents(__DIR__ . '/../../../index.html');
        self::assertNotEmpty($indexHtmlContent);
        self::assertGreaterThan(0, preg_match_all('~(?:href|src)=["\'](?<link>[^"\']+)["\']~', $indexHtmlContent, $linksMatches));
        $localLinks = array_filter($linksMatches['link'], static function (string $link) {
            return !preg_match('~^(http|//)~', $link);
        });
        self::assertNotEmpty($localLinks);
        foreach ($localLinks as $localLink) {
            self::assertGreaterThan(
                0,
                preg_match('~^(?<assetPath>[^?]+)[?]version=(?<version>[[:alnum:]]+)~', $localLink, $versionMatch),
                sprintf('Asset link %s is missing ?version=foo', $localLink)
            );
            $assetPath = $versionMatch['assetPath'];
            $usedVersion = $versionMatch['version'];
            $assetFullPath = __DIR__ . '/../../../' . ltrim($assetPath, '/');
            $realVersion = md5_file($assetFullPath);
            self::assertFileExists($assetFullPath);
            self::assertSame(
                $realVersion,
                $usedVersion,
                sprintf(
                    'Asset link %s should have version %s, it can be fixed by %s%s',
                    $localLink,
                    $realVersion,
                    "\n",
                    sprintf('sed --in-place "s~%s~%s~g" index.html', $localLink, str_replace($usedVersion, $realVersion, $localLink))
                )
            );
        }
    }
}