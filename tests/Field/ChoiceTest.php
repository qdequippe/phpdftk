<?php

declare(strict_types=1);

namespace Qdequippe\PHPDFtk\Tests\Field;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Qdequippe\PHPDFtk\Field\Choice;
use Qdequippe\PHPDFtk\Field\Type;

#[CoversClass(Choice::class)]
final class ChoiceTest extends TestCase
{
    public function testConstructWithValues(): void
    {
        // Arrange
        $choice = new Choice(
            name: 'A choice',
            nameAlt: 'Alt choice',
            flags: 1,
            justification: 'left',
            value: 'On',
            valueDefault: 'On',
            stateOption: ['On', 'Off']
        );

        // Act
        // Assert
        $this->assertSame(Type::Choice, $choice->getType());
        $this->assertSame('A choice', $choice->getName());
        $this->assertSame('Alt choice', $choice->getNameAlt());
        $this->assertSame(1, $choice->getFlags());
        $this->assertSame('On', $choice->getValue());
        $this->assertSame('left', $choice->getJustification());
        $this->assertSame('On', $choice->getValueDefault());
        $this->assertSame(['On', 'Off'], $choice->getStateOption());
    }
}
