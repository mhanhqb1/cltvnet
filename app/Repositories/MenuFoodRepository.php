<?php

namespace App\Repositories;

use App\Models\MenuFood;

class MenuFoodRepository extends BaseRepository
{
    public function __construct(private MenuFood $menuFood)
    {
        parent::__construct($menuFood);
    }
}
