<?php

declare(strict_types=1);

namespace Qdequippe\PHPDFtk\Tests\Report;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Qdequippe\PHPDFtk\Report\Bookmark;
use Qdequippe\PHPDFtk\Report\Info;
use Qdequippe\PHPDFtk\Report\PageMedia;
use Qdequippe\PHPDFtk\Report\Report;

#[CoversClass(Report::class)]
final class ReportTest extends TestCase
{
    public function testConstructWithValues(): void
    {
        // Arrange
        $info1 = new Info(
            key: 'key1',
            value: 'value1',
        );
        $info2 = new Info(
            key: 'key2',
            value: 'value2',
        );

        $pageMedia = new PageMedia(
            number: 1,
            rotation: 90,
            rect: [34, 87, 90],
            dimensions: [290, 738, 393, 383],
        );

        $bookmark1 = new Bookmark(
            title: 'A bookmark 1',
            level: 2,
            pageNumber: 2,
        );
        $bookmark2 = new Bookmark(
            title: 'A bookmark 2',
            level: 2,
            pageNumber: 3,
        );

        $report = new Report(
            infos: [$info1, $info2],
            pdfID0: 'abcde',
            pdfID1: 'def',
            numberOfPages: 2,
            bookmarks: [$bookmark1, $bookmark2],
            pageMedias: [$pageMedia],
        );

        // Act
        // Assert
        $this->assertSame([$info1, $info2], $report->getInfos());
        $this->assertSame([$bookmark1, $bookmark2], $report->getBookmarks());
        $this->assertSame([$pageMedia], $report->getPageMedias());
        $this->assertSame('abcde', $report->getPdfID0());
        $this->assertSame('def', $report->getPdfID1());
        $this->assertSame(2, $report->getNumberOfPages());
    }
}
