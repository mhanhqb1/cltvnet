<?php

namespace App\Common\Definition;

enum FoodType: string
{
    use EnumEx;

    case Primary = '1';
    case Secondary = '2';
    case Soup = '3';
    case Desserts = '4';
    case Other = '5';

    /**
     * {@inheritDoc}
     */
    public static function i18n(): array
    {
        return [
            self::Primary->value => 'Mon chinh, mon man',
            self::Secondary->value => 'Mon phu (xao, rau luoc, ...)',
            self::Soup->value => 'Mon canh',
            self::Desserts->value => 'Mon trang mieng (trai cay, sua chua, banh ngot, ...)',
            self::Other->value => 'Mon an kem (ca phao, kieu, ...)',
        ];
    }
}
