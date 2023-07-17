<?php

namespace App\Common\Definition;

enum UserAuthority: string
{
    use EnumEx;

    case Administrator = '99';
    case General = '0';

    /**
     * {@inheritDoc}
     */
    public static function i18n(): array
    {
        return [
            self::Administrator->value => '管理者',
            self::General->value => '一般',
        ];
    }
}
