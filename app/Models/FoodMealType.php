<?php

namespace App\Models;

use App\Common\Definition\MealType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodMealType extends BaseModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'food_meal_types';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'food_meal_type_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'food_id',
        'meal_type',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'meal_type' => MealType::class,
    ];

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
            'meal_type' => fn (Builder $builder, $value) => $builder->where('meal_type', $value),
        ];
    }
}
