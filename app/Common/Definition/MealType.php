<?php

namespace App\Common\Definition;

enum MealType: string
{
    use EnumEx;

    case Breakfast = '1';
    case Lunch = '2';
    case Dinner = '3';
    case Snacks = '4'; // an vat
    case Party = '5'; // an nhau
    case EatWeaning = '6'; // an dam

    /**
     * {@inheritDoc}
     */
    public static function i18n(): array
    {
        return [
            self::Breakfast->value => __('breakfast'),
            self::Lunch->value => __('lunch'),
            self::Dinner->value => __('dinner'),
            self::Snacks->value => __('snacks'),
            self::Party->value => __('party'),
            self::EatWeaning->value => __('eat_weaning'),
        ];
    }

    public static function all(): array
    {
        return [
            self::Breakfast->value => [
                'title' => __('breakfast'),
                'image' => '',
                'slug' => '',
            ],
            self::Lunch->value => [
                'title' => __('lunch'),
                'image' => '',
                'slug' => '',
            ],
            self::Dinner->value => [
                'title' => __('dinner'),
                'image' => '',
                'slug' => '',
            ],
            self::Snacks->value => [
                'title' => __('snacks'),
                'image' => '',
                'slug' => '',
            ],
            self::Party->value => [
                'title' => __('party'),
                'image' => '',
                'slug' => '',
            ],
            self::EatWeaning->value => [
                'title' => __('eat_weaning'),
                'image' => '',
                'slug' => '',
            ],
        ];
    }
}
