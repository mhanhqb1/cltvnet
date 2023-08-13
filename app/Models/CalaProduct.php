<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CalaProduct extends BaseModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cala_products';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'product_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'cost',
        'price',
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
            'description' => 'textarea',
            'detail' => 'text_editor',
            'cost' => 'text',
            'price' => 'text',
        ];
    }

    public function getImageFormat() {
        return $this->image ? "<img src='".getImageUrl($this->image)."' width='100px' />" : "";
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
        ];
    }
}
