<?php

namespace App\Repositories;

use App\Models\FoodMealType;

class FoodMealTypeRepository extends BaseRepository
{
    public function __construct(private FoodMealType $foodMealType)
    {
        parent::__construct($foodMealType);
    }
}
