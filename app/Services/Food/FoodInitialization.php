<?php

namespace App\Services\Food;

use App\Models\Food;
use App\Services\AbstractService;

class FoodInitialization extends AbstractService
{
    public function initFood(): object
    {
        $newFood = new Food();

        return $newFood;
    }
}
