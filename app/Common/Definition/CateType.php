<?php

namespace App\Common\Definition;

enum CateType: string
{
    use EnumEx;

    case Menu = '0';
    case Food = '1';
    case Nutrition = '2';

    /**
     * {@inheritDoc}
     */
    public static function i18n(): array
    {
        return [
            self::Menu->value => __('menu'),
            self::Food->value => __('food'),
            self::Nutrition->value => __('nutrition'),
        ];
    }
}
