<?php

namespace App\Common\Definition;

enum Level: string
{
    use EnumEx;

    case Easy = '1';
    case Medium = '2';
    case Difficult = '3';

    /**
     * {@inheritDoc}
     */
    public static function i18n(): array
    {
        return [
            self::Easy->value => __('easy'),
            self::Medium->value => __('medium'),
            self::Difficult->value => __('difficult'),
        ];
    }
}
