<?php

declare(strict_types=1);

namespace Qdequippe\PHPDFtk\Tests\Field;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Qdequippe\PHPDFtk\Field\Text;
use Qdequippe\PHPDFtk\Field\Type;

#[CoversClass(Text::class)]
final class TextTest extends TestCase
{
    public function testConstructWithValues(): void
    {
        // Arrange
        $text = new Text(
            name: 'A text',
            nameAlt: 'Alt text',
            flags: 3,
            justification: 'right',
            value: 'Test',
        );

        // Act
        // Assert
        $this->assertSame(Type::Text, $text->getType());
        $this->assertSame('A text', $text->getName());
        $this->assertSame('Alt text', $text->getNameAlt());
        $this->assertSame(3, $text->getFlags());
        $this->assertSame('Test', $text->getValue());
        $this->assertSame('right', $text->getJustification());
    }
}
