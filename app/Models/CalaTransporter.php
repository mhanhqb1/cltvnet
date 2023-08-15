<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CalaTransporter extends BaseModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cala_transporters';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'transporter_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
        'phone',
        'time_start',
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
            'address' => 'text',
            'phone' => 'text',
            'time_start' => 'text',
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
            'transporter_id' => fn (Builder $builder, $value) => $builder->where('transporter_id', $value),
        ];
    }
}
