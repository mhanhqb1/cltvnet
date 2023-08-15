<?php

namespace App\Common\Definition;

enum OrderStatus: string
{
    use EnumEx;

    case Pending = '0';
    case Doing = '1';
    case Done = '2';
    case Delivered = '3';
    case Paid = '4';
    case Completed = '5';

    /**
     * {@inheritDoc}
     */
    public static function i18n(): array
    {
        return [
            self::Pending->value => __('order_pending'),
            self::Doing->value => __('order_doing'),
            self::Done->value => __('order_done'),
            self::Delivered->value => __('order_delivered'),
            self::Paid->value => __('order_paid'),
            self::Completed->value => __('order_completed'),
        ];
    }
}
