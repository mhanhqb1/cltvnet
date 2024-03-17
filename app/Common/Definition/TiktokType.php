<?php

namespace App\Common\Definition;

enum TiktokType: string
{
    use EnumEx;

    case None = '0';
    case Food = '1';
    case Restaurant = '2';
    case Hotel = '3';

    /**
     * {@inheritDoc}
     */
    public static function i18n(): array
    {
        return [
            self::None->value => '-',
            self::Food->value => 'Food',
            self::Restaurant->value => 'Restaurant',
            self::Hotel->value => 'Hotel',
        ];
    }
}
