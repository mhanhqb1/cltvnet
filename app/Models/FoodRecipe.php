<?php

namespace App\Models;

use App\Common\Definition\RecipeType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FoodRecipe extends BaseModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'food_recipes';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'food_recipe_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'food_id',
        'ingredient_id',
        'weight',
        'recipe_type',
        'note',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'recipe_type' => RecipeType::class,
    ];

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
            'ingredient_id' => 'select2',
            'weight' => 'text',
            'recipe_type' => 'select',
            'note' => 'textarea',
        ];
    }

    public function getRecipeData() {
        return [
            'ingredient_id' => $this->ingredient_id,
            'weight' => $this->weight,
            'recipe_type' => $this->recipe_type?->value,
            'note' => $this->note,
        ];
    }

    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class, 'ingredient_id', 'ingredient_id');
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
            'ingredient_id' => fn (Builder $builder, $value) => $builder->where('ingredient_id', $value),
            'type' => fn (Builder $builder, $value) => $builder->where('type', $value),
        ];
    }
}
