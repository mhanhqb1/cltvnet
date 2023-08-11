<?php

namespace App\Services\FoodRecipe;

use App\Repositories\FoodRecipeRepository;
use App\Services\AbstractFinder;
use Illuminate\Database\Eloquent\Collection;

class FoodRecipeFinder extends AbstractFinder
{
    public function __construct(private FoodRecipeRepository $foodRecipeRepository)
    {
        parent::__construct($foodRecipeRepository);
    }

    public function getAll(array $conditions): Collection
    {
        $foodRecipes = $this
            ->foodRecipeRepository
            ->fetchAll($conditions);
        return $foodRecipes;
    }
}
