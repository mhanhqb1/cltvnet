<?php

namespace App\Repositories;

use App\Models\FoodRecipe;
use Illuminate\Database\Eloquent\Collection;

class FoodRecipeRepository extends BaseRepository
{
    public function __construct(private FoodRecipe $foodRecipe)
    {
        parent::__construct($foodRecipe);
    }

    public function fetchAll(array $searchConditions): Collection
    {
        return $this
            ->foodRecipe
            ->whereMultiConditions($searchConditions)
            ->get();
    }
}
