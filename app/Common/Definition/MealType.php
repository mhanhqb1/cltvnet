<?php

namespace App\Common\Definition;

enum MealType: string
{
    use EnumEx;

    case Breakfast = '1';
    case Meal = '2';
    case EatClean = '3';
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
            self::Meal->value => __('lunch_dinner'),
            self::EatClean->value => __('eat_clean'),
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
                'image' => asset('images/menu_breakfast.jpg'),
                'slug' => '',
            ],
            self::Meal->value => [
                'title' => __('lunch_dinner'),
                'image' => asset('images/menu_meal.jpg'),
                'slug' => '',
            ],
            self::EatClean->value => [
                'title' => __('eat_clean'),
                'image' => asset('images/menu_eat_clean.jpg'),
                'slug' => '',
            ],
            self::Snacks->value => [
                'title' => __('snacks'),
                'image' => asset('images/menu_snack.jpg'),
                'slug' => '',
            ],
            self::Party->value => [
                'title' => __('party'),
                'image' => asset('images/menu_party.jpg'),
                'slug' => '',
            ],
            self::EatWeaning->value => [
                'title' => __('eat_weaning'),
                'image' => asset('images/menu_eat_weaning.jpg'),
                'slug' => '',
            ],
        ];
    }
}
