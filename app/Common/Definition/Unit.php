<?php

namespace App\Common\Definition;

enum Unit: string
{
    use EnumEx;

    case Default = '0';
    case Gram = '1';
    case Kilogram = '2';
    case Package = '3';
    case Spoon = '4';

    /**
     * {@inheritDoc}
     */
    public static function i18n(): array
    {
        return [
            self::Default->value => '',
            self::Gram->value => __('g'),
            self::Kilogram->value => __('kg'),
            self::Package->value => __('package'),
            self::Spoon->value => __('spoon'),
        ];
    }
}
