<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\Auth;

class Menu extends BaseModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menus';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'menu_id';

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
        'created_by',
        'updated_by',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        // 'unit' => Unit::class,
    ];

    public static function getAttributeNames() {
        $self = new self;
        $attrNames = [
            $self->primaryKey => __($self->primaryKey),
            'food_id' => __('food_id'),
            'food' => __('food'),
            'cate_id' => __('cate_id'),
            'cate' => __('cate'),
        ];
        foreach ($self->fillable as $field) {
            $attrNames[$field] = __($field);
        }
        return $attrNames;
    }

    public static function getAttributeInputTypes() {
        return [
            'name' => 'text',
            'food_id' => 'select2',
            'cate_id' => 'select2',
            'image' => 'file',
            'description' => 'textarea',
            'detail' => 'text_editor',
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
    public function getFoodIdAttribute()
    {
        $foodIds = [];
        if (!$this->foods->isEmpty()) {
            foreach ($this->foods as $food) {
                $foodIds[] = $food->food_id;
            }
        }
        return $foodIds;
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

    public function menuFoods(): HasMany
    {
        return $this->hasMany(MenuFood::class, 'menu_id', 'menu_id');
    }

    public function foods(): HasManyThrough
    {
        return $this->hasManyThrough(Food::class, MenuFood::class, 'menu_id', 'food_id', 'menu_id', 'food_id');
    }

    public function cates(): HasManyThrough
    {
        return $this->hasManyThrough(Cate::class, MenuCate::class, 'menu_id', 'cate_id', 'menu_id', 'cate_id');
    }

    public function getImageFormat(): string
    {
        return $this->image ? "<img src='".getImageUrl($this->image)."' width='100px' />" : "";
    }

    public function getFoods(): string
    {
        $foods = [];
        if (!$this->foods->isEmpty()) {
            foreach ($this->foods as $food) {
                $foods[] = '<li>'.$food->name.'</li>';
            }
        }
        return '<ul>'.implode('', $foods).'</ul>';
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
            'menu_id' => fn (Builder $builder, $value) => $builder->where('menu_id', $value),
            'slug' => fn (Builder $builder, $value) => $builder->where('slug', $value),
            // 'food_id' => fn (Builder $builder, $value) => $builder->whereHas('foods', function($q) use($value) {
            //     $q->where('foods.food_id', $value);
            // }),
        ];
    }
}
