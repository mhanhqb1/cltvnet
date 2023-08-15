<?php

namespace App\Common\Definition;

enum VideoType: string
{
    use EnumEx;

    case Youtube = '1';
    case Dailymotion = '2';
    case Tiktok = '3';

    /**
     * {@inheritDoc}
     */
    public static function i18n(): array
    {
        return [
            self::Youtube->value => __('youtube'),
            self::Dailymotion->value => __('dailymotion'),
            self::Tiktok->value => __('tiktok'),
        ];
    }
}
