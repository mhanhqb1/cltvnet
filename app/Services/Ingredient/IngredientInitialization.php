<?php

namespace App\Services\Ingredient;

use App\Models\Ingredient;
use App\Services\AbstractService;

class IngredientInitialization extends AbstractService
{
    public function initIngredient(): object
    {
        $newIngredient = new Ingredient();

        return $newIngredient;
    }
}
