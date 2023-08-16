<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class CalaCostOrder extends BaseModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cala_cost_orders';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'cost_order_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_date',
        'total_price',
        'description',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        // 'status' => OrderStatus::class,
    ];

    public static function getAttributeNames() {
        $self = new self;
        $attrNames = [
            $self->primaryKey => __($self->primaryKey),
        ];
        foreach ($self->fillable as $field) {
            $attrNames[$field] = __($field);
        }
        return $attrNames;
    }

    public static function getAttributeInputTypes() {
        return [
            'description' => 'textarea',
            'order_date' => 'datepicker',
            'total_price' => 'text',
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
            'cost_order_id' => fn (Builder $builder, $value) => $builder->where('cost_order_id', $value),
        ];
    }
}
