<?php

declare(strict_types=1);

namespace Qdequippe\PHPDFtk\Tests\Report;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Qdequippe\PHPDFtk\Report\Bookmark;

#[CoversClass(Bookmark::class)]
final class BookmarkTest extends TestCase
{
    public function testConstructWithValues(): void
    {
        // Arrange
        $bookmark = new Bookmark(
            title: 'A bookmark',
            level: 2,
            pageNumber: 2,
        );

        // Act
        // Assert
        $this->assertSame('A bookmark', $bookmark->getTitle());
        $this->assertSame(2, $bookmark->getLevel());
        $this->assertSame(2, $bookmark->getPageNumber());
    }
}
