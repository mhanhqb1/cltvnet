<?php

namespace App\Models;

use App\Common\Definition\Unit;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\Auth;

class Ingredient extends BaseModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ingredients';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'ingredient_id';

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
        'total_view',
        'total_food',
        'unit',
        'price_unit',
        'price',
        'created_by',
        'updated_by',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'unit' => Unit::class,
    ];

    public static function getAttributeNames() {
        $self = new self;
        $attrNames = [
            $self->primaryKey => __($self->primaryKey),
            'cate_id' => __('cate_id'),
            'cate' => __('cate'),
            'nutrition_id' => __('nutrition_id'),
            'nutrition' => __('nutrition'),
        ];
        foreach ($self->fillable as $field) {
            $attrNames[$field] = __($field);
        }
        return $attrNames;
    }

    public static function getAttributeInputTypes() {
        return [
            'name' => 'text',
            'cate_id' => 'select2',
            'nutrition_id' => 'select2',
            'image' => 'file',
            'description' => 'textarea',
            'detail' => 'text_editor',
            'unit' => 'select',
            'price_unit' => 'text',
            'price' => 'text',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::user()->id;
            $model->updated_by = Auth::user()->id;
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::user()->id;
        });
    }
    public function getCateIdAttribute()
    {
        $cateIds = [];
        if (!$this->cates->isEmpty()) {
            foreach ($this->cates as $cate) {
                $cateIds[] = $cate->cate_id;
            }
        }
        return $cateIds;
    }

    public function getNutritionIdAttribute()
    {
        $nutritionIds = [];
        if (!$this->nutritions->isEmpty()) {
            foreach ($this->nutritions as $nutrition) {
                $nutritionIds[] = $nutrition->nutrition_id;
            }
        }
        return $nutritionIds;
    }

    public function cates(): HasManyThrough
    {
        return $this->hasManyThrough(Cate::class, IngredientCate::class, 'ingredient_id', 'cate_id', 'ingredient_id', 'cate_id');
    }

    public function nutritions(): HasManyThrough
    {
        return $this->hasManyThrough(Nutrition::class, IngredientNutrition::class, 'ingredient_id', 'nutrition_id', 'ingredient_id', 'nutrition_id');
    }

    public function getImageFormat(): string
    {
        return $this->image ? "<img src='".getImageUrl($this->image)."' width='100px' />" : "";
    }

    public function getCates(): string
    {
        $cates = [];
        if (!$this->cates->isEmpty()) {
            foreach ($this->cates as $cate) {
                $cates[] = $cate->name;
            }
        }
        return implode(' - ', $cates);
    }

    public function getNutritions(): string
    {
        $nutritions = [];
        if (!$this->nutritions->isEmpty()) {
            foreach ($this->nutritions as $nutrition) {
                $nutritions[] = $nutrition->name;
            }
        }
        return implode(' - ', $nutritions);
    }

    public function getNameForRecipe(): string
    {
        return $this->name.' - '.$this->unit?->getName();
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
            'ingredient_id' => fn (Builder $builder, $value) => $builder->where('ingredient_id', $value),
            'slug' => fn (Builder $builder, $value) => $builder->where('slug', $value),
            'cate_id' => fn (Builder $builder, $value) => $builder->whereHas('cates', function($q) use($value) {
                $q->where('cates.cate_id', $value);
            }),
        ];
    }
}
