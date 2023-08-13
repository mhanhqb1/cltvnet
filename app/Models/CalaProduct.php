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
        'detail',
        'cost',
        'price',
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
            'name' => 'text',
            'image' => 'file',
            'cost' => 'text',
            'price' => 'text',
            'description' => 'textarea',
            'detail' => 'text_editor',
        ];
    }

    public function getImageFormat($width = '100px'): string
    {
        return $this->image ? "<img src='".getImageUrl($this->image)."' width='".$width."' />" : "";
    }

    public function getProductFormat(): string
    {
        return $this->getImageFormat('20px').'|'.$this->name;
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
