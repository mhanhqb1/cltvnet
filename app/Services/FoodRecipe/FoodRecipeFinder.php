<?php

namespace App\Services\FoodRecipe;

use App\Repositories\FoodRecipeRepository;
use App\Services\AbstractFinder;

class FoodRecipeFinder extends AbstractFinder
{
    public function __construct(private FoodRecipeRepository $foodRecipeRepository)
    {
        parent::__construct($foodRecipeRepository);
    }
}
