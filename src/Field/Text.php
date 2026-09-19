<?php

declare(strict_types=1);

namespace Qdequippe\PHPDFtk\Field;

/**
 * @see \Qdequippe\PHPDFtk\Tests\Field\TextTest
 */
final class Text extends Field
{
    public function __construct(string $name, ?string $nameAlt = null, ?int $flags = null, ?string $justification = null, ?string $value = null)
    {
        parent::__construct(Type::Text, $name, $nameAlt, $flags, $justification, $value);
    }
}
