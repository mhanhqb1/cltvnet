<?php

namespace App\Common\Definition;

enum RecipeType: string
{
    use EnumEx;

    case Primary = '1';
    case Secondary = '2';
    case Spice = '3';

    /**
     * {@inheritDoc}
     */
    public static function i18n(): array
    {
        return [
            self::Primary->value => __('receipe_ingredient_primary'),
            self::Secondary->value => __('receipe_ingredient_secondary'),
            self::Spice->value => __('receipe_ingredient_spice'),
        ];
    }
}
