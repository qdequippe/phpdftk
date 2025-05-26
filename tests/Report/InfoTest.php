<?php

declare(strict_types=1);

namespace Qdequippe\PHPDFtk\Tests\Report;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Qdequippe\PHPDFtk\Report\Info;

#[CoversClass(Info::class)]
final class InfoTest extends TestCase
{
    public function testConstructWithValues(): void
    {
        // Arrange
        $info = new Info(
            key: 'key',
            value: 'value',
        );

        // Act
        // Assert
        $this->assertSame('key', $info->getKey());
        $this->assertSame('value', $info->getValue());
    }
}
