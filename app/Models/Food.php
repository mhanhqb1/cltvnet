<?php

namespace App\Models;

use App\Common\Definition\FoodType;
use App\Common\Definition\Level;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
            // 'cate_id' => 'select2',
            'image' => 'file',
            'description' => 'textarea',
            'detail' => 'text_editor',
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
