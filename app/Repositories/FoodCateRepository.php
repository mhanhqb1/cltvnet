<?php

namespace App\Repositories;

use App\Models\FoodCate;

class FoodCateRepository extends BaseRepository
{
    public function __construct(private FoodCate $foodCate)
    {
        parent::__construct($foodCate);
    }
}
