<?php

namespace App\Models;

use App\Common\Definition\OrderStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class CalaOrder extends BaseModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cala_orders';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'order_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'status',
        'order_date',
        'delivery_date', // ngày khách hàng muốn nhận hàng
        'shipping_date',// Ngày gửi hàng
        'paid_date',
        'total_cost',
        'total_price',
        'total_profit',
        'shipping_name',
        'shipping_time',
        'shipping_address',
        'shipping_phone',
        'transporter_id',
        'note',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'status' => OrderStatus::class,
    ];

    public static function getAttributeNames() {
        $self = new self;
        $attrNames = [
            $self->primaryKey => __($self->primaryKey),
            'product_id' => __('product_id'),
        ];
        foreach ($self->fillable as $field) {
            $attrNames[$field] = __($field);
        }
        return $attrNames;
    }

    public static function getAttributeInputTypes() {
        return [
            'customer_id' => 'select',
            'status' => 'select',
            'product_id' => 'select2',
            'order_date' => 'datepicker',
            'delivery_date' => 'datepicker',
            'shipping_date' => 'datepicker',
            'shipping_time' => 'text',
            'paid_date' => 'datepicker',
            'note' => 'textarea',
        ];
    }

    public function products(): HasManyThrough
    {
        return $this->hasManyThrough(CalaProduct::class, CalaOrderProduct::class, 'order_id', 'product_id', 'order_id', 'product_id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(CalaCustomer::class, 'customer_id', 'customer_id');
    }

    public function getProductIdAttribute(): array
    {
        $productIds = [];
        if (!$this->products->isEmpty()) {
            foreach ($this->products as $product) {
                $productIds[] = $product->product_id;
            }
        }
        return $productIds;
    }

    public function getProductHtml(): string
    {
        $html = '';
        if (!$this->products->isEmpty()) {
            $html .= '<ul class="list-unstyled">';
            foreach ($this->products as $product) {
                $html .= '<li>'.$product->getProductFormat().'</li>';
            }
            $html .= '</ul>';
        }
        return $html;
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
            'order_id' => fn (Builder $builder, $value) => $builder->where('order_id', $value),
            'customer_id' => fn (Builder $builder, $value) => $builder->where('customer_id', $value),
            'status' => fn (Builder $builder, $value) => $builder->where('status', $value),
        ];
    }
}
