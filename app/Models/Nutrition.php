<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Nutrition extends BaseModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nutritions';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'nutrition_id';

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
        'created_by',
        'updated_by',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        // 'delivery_finish_date' => 'date:Y/m/d',
    ];

    public static function getAttributeNames() {
        return [
            'nutrition_id' => __('nutrition_id'),
            'name' => __('name'),
            'slug' => __('slug'),
            'image' => __('image'),
            'description' => __('description'),
            'detail' => __('detail'),
            'created_by' => __('created_by'),
            'updated_by' => __('updated_by'),
        ];
    }

    public static function getAttributeInputTypes() {
        return [
            'name' => 'text',
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
            'nutrition_id' => fn (Builder $builder, $value) => $builder->where('nutrition_id', $value),
            'slug' => fn (Builder $builder, $value) => $builder->where('slug', $value),
        ];
    }
}
