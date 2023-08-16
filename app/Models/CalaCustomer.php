<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CalaCustomer extends BaseModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cala_customers';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'customer_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'phone',
        'address',
        'image',
        'facebook',
        'zalo',
        'shipping_name',
        'shipping_address',
        'shipping_phone',
        'transporter_id',
    ];

    /**
     * @var string[]
     */
    protected $casts = [];

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
            'name' => 'text',
            'image' => 'file',
            'address' => 'text',
            'phone' => 'text',
            'facebook' => 'text',
            'zalo' => 'text',
            'shipping_name' => 'text',
            'shipping_phone' => 'text',
            'shipping_address' => 'text',
            'transporter_id' => 'select',
        ];
    }

    public function transporter(): BelongsTo
    {
        return $this->belongsTo(CalaTransporter::class, 'transporter_id', 'transporter_id');
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
            'customer_id' => fn (Builder $builder, $value) => $builder->where('customer_id', $value),
        ];
    }
}
