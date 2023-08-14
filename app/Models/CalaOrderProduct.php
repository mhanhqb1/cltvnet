<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CalaOrderProduct extends BaseModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cala_order_products';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'order_product_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'cost',
        'price',
        'profit'
    ];

    /**
     * @var string[]
     */
    protected $casts = [];

    public static function getAttributeNames(): array
    {
        $self = new self;
        $attrNames = [
            $self->primaryKey => __($self->primaryKey),
        ];
        foreach ($self->fillable as $field) {
            $attrNames[$field] = __($field);
        }
        return $attrNames;
    }

    public static function getAttributeInputTypes(): array
    {
        return [
            'product_id' => 'select',
            'cost' => 'text',
            'price' => 'text',
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
            'product_id' => fn (Builder $builder, $value) => $builder->where('product_id', $value),
            'order_id' => fn (Builder $builder, $value) => $builder->where('order_id', $value),
            'order_product_id' => fn (Builder $builder, $value) => $builder->where('order_product_id', $value),
        ];
    }
}
