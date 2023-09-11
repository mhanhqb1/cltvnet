<?php

namespace App\Models;

use App\Common\Definition\FoodType;
use App\Common\Definition\Level;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\Auth;

class Food extends BaseModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'foods';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'food_id';

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
        'type',
        'time',
        'level',
        'total_view',
        'created_by',
        'updated_by',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'type' => FoodType::class,
        'level' => Level::class,
    ];

    public static function getAttributeNames() {
        $self = new self;
        $attrNames = [
            $self->primaryKey => __($self->primaryKey),
            'cate_id' => __('cate_id'),
            'cate' => __('cate'),
            'meal_type' => __('meal_type'),
        ];
        foreach ($self->fillable as $field) {
            $attrNames[$field] = __($field);
        }
        $attrNames['time'] = __('time_min');
        return $attrNames;
    }

    public static function getAttributeInputTypes() {
        return [
            'name' => 'text',
            'cate_id' => 'select2',
            'image' => 'file',
            'description' => 'textarea',
            'detail' => 'text_editor',
            'meal_type' => 'select2',
            'type' => 'select',
            'time' => 'text',
            'level' => 'select',
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

    public function cates(): HasManyThrough
    {
        return $this->hasManyThrough(Cate::class, FoodCate::class, 'food_id', 'cate_id', 'food_id', 'cate_id');
    }

    public function mealTypes(): HasMany
    {
        return $this->HasMany(FoodMealType::class, 'food_id', 'food_id');
    }

    public function recipes(): HasMany
    {
        return $this->HasMany(FoodRecipe::class, 'food_id', 'food_id');
    }

    public function videos(): HasMany
    {
        return $this->HasMany(FoodVideo::class, 'food_id', 'food_id');
    }

    public function articles(): HasMany
    {
        return $this->HasMany(FoodArticle::class, 'food_id', 'food_id');
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

    public function getMealTypeAttribute()
    {
        $mealTypes = [];
        if (!$this->mealTypes->isEmpty()) {
            foreach ($this->mealTypes as $mealType) {
                $mealTypes[] = $mealType->meal_type->value;
            }
        }
        return $mealTypes;
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
            'food_id' => fn (Builder $builder, $value) => $builder->where('food_id', $value),
        ];
    }
}
