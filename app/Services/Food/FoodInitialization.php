<?php

namespace App\Services\Food;

use App\Common\Definition\Level;
use App\Models\Food;
use App\Services\AbstractService;

class FoodInitialization extends AbstractService
{
    public function initFood(): object
    {
        $newFood = new Food();
        $newFood->time = 0;
        $newFood->level = Level::Easy->value;
        return $newFood;
    }
}
