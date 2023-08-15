<?php

namespace App\Repositories;

use App\Models\IngredientNutrition;

class IngredientNutritionRepository extends BaseRepository
{
    public function __construct(private IngredientNutrition $ingredientNutrition)
    {
        parent::__construct($ingredientNutrition);
    }
}
