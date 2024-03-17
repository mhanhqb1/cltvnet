<?php

namespace App\Models;

use App\Common\Definition\TiktokType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiktok extends BaseModel
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'tiktoks';

   /**
    * The primary key associated with the table.
    *
    * @var int
    */
   protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'unique_id',
        'name',
        'tiktok_id',
        'image',
        'type',
        'note',
        'crawl_at',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'type' => TiktokType::class,
        'crawl_at' => 'date:Y-m-d',
    ];

    public static function getAttributeNames() {
        return [
            'id' => __('id'),
            'unique_id' => __('unique_id'),
            'name' => __('name'),
            'tiktok_id' => __('tiktok_id'),
            'image' => __('image'),
            'type' => __('type'),
            'note' => __('note'),
            'crawl_at' => __('crawl_at'),
        ];
    }

    public static function getAttributeInputTypes() {
        return [
            'unique_id' => 'text',
            'type' => 'select',
            'note' => 'textarea',
        ];
    }

    public static function scopeWhereMultiConditions(Builder $builder, array $conditions): Builder
    {
        return self::setWhereClause($builder, $conditions, self::mapWhere());
    }

    /**
     * @return \Closure[]
     */
    private static function mapWhere(): array
    {
        return [
            'type' => fn (Builder $builder, $value) => $builder->where('type', $value),
            'unique_id' => fn (Builder $builder, $value) => $builder->where('unique_id', $value),
        ];
    }
}
