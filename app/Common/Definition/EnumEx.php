<?php

namespace App\Common\Definition;

trait EnumEx
{
    /**
     * @return array
     */
    abstract public static function i18n(): array;

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function getName(): string
    {
        return self::i18n()[$this->value];
    }
}
