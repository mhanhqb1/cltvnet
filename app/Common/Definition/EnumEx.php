<?php

namespace App\Common\Definition;

trait EnumEx
{
    /**
     * 定義値の値を配列で取得する。
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * 定義値に対応した名称を取得する。
     */
    public function getName(): string
    {
        return self::i18n()[$this->value];
    }

    /**
     * @return array
     * 定義値に対応した名称を定義。
     */
    abstract public static function i18n(): array;

    public function getNameAlias(): string
    {
        return self::alias()[$this->value];
    }

    public static function find($id): string
    {
        if (collect(self::i18n())->has($id)) {
            return $id.': '.self::i18n()[$id];
        }

        return '';
    }

    public static function findBySlug(string $slug): string
    {
        $data = '';
        $all = self::all();
        foreach ($all as $id => $item) {
            if ($item['slug'] == $slug) {
                return $id;
            }
        }
        return $data;
    }
}
