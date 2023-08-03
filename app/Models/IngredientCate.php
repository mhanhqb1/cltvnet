<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class IngredientCate extends BaseModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ingredient_cates';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'ingredient_cate_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ingredient_id',
        'cate_id',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        // 'delivery_finish_date' => 'date:Y/m/d',
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
            'ingredient_id' => fn (Builder $builder, $value) => $builder->where('ingredient_id', $value),
            'cate_id' => fn (Builder $builder, $value) => $builder->where('cate_id', $value),
        ];
    }
}
