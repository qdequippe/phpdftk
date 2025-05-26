<?php

declare(strict_types=1);

namespace Qdequippe\PHPDFtk\Tests\Field;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Qdequippe\PHPDFtk\Field\Button;
use Qdequippe\PHPDFtk\Field\Type;

#[CoversClass(Button::class)]
final class ButtonTest extends TestCase
{
    public function testConstructWithValues(): void
    {
        // Arrange
        $button = new Button(
            name: 'A button',
            nameAlt: 'Alt button',
            flags: 1,
            justification: 'center',
            value: 'On',
            stateOption: ['On', 'Off']
        );

        // Act
        // Assert
        $this->assertSame(Type::Button, $button->getType());
        $this->assertSame('A button', $button->getName());
        $this->assertSame('Alt button', $button->getNameAlt());
        $this->assertSame(1, $button->getFlags());
        $this->assertSame('On', $button->getValue());
        $this->assertSame('center', $button->getJustification());
        $this->assertSame(['On', 'Off'], $button->getStateOption());
    }
}
