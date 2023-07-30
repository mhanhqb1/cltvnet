<?php

namespace App\Services\Nutrition;

use App\Models\Nutrition;
use App\Services\AbstractService;

class NutritionInitialization extends AbstractService
{
    public function initNutrition(): object
    {
        $newNutrition = new Nutrition();

        return $newNutrition;
    }
}
