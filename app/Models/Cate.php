<?php

namespace App\Models;

use App\Common\Definition\CateType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cate extends BaseModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cates';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'cate_id';

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
        'type'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'type' => CateType::class,
    ];

    public static function getAttributeNames() {
        return [
            'cate_id' => __('cate_id'),
            'name' => __('name'),
            'slug' => __('slug'),
            'image' => __('image'),
            'description' => __('description'),
            'type' => __('type'),
        ];
    }

    public static function getAttributeInputTypes() {
        return [
            'name' => 'text',
            'image' => 'file',
            'description' => 'textarea',
            'type' => 'select',
        ];
    }

    public function getImageFormat() {
        return $this->image ? "<img src='".getImageUrl($this->image)."' width='100px' />" : "";
    }

    public function getName() {
        return $this->cate_id.': '.$this->name.' - '.$this->type?->getName();
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
            'cate_id' => fn (Builder $builder, $value) => $builder->where('cate_id', $value),
            'slug' => fn (Builder $builder, $value) => $builder->where('slug', $value),
            'type' => fn (Builder $builder, $value) => $builder->where('type', $value),
        ];
    }
}
