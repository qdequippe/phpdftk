<?php

declare(strict_types=1);

namespace Qdequippe\PHPDFtk\Tests\Report;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Qdequippe\PHPDFtk\Report\PageMedia;

#[CoversClass(PageMedia::class)]
final class PageMediaTest extends TestCase
{
    public function testConstructWithValues(): void
    {
        // Arrange
        $pageMedia = new PageMedia(
            number: 1,
            rotation: 90,
            rect: [34, 87, 90],
            dimensions: [290, 738, 393, 383],
        );

        // Act
        // Assert
        $this->assertSame(1, $pageMedia->getNumber());
        $this->assertSame(90.0, $pageMedia->getRotation());
        $this->assertSame([34, 87, 90], $pageMedia->getRect());
        $this->assertSame([290, 738, 393, 383], $pageMedia->getDimensions());
    }
}
