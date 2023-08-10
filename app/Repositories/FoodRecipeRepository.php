<?php

namespace App\Repositories;

use App\Models\FoodRecipe;

class FoodRecipeRepository extends BaseRepository
{
    public function __construct(private FoodRecipe $foodRecipe)
    {
        parent::__construct($foodRecipe);
    }
}
