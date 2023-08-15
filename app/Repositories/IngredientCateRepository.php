<?php

namespace App\Repositories;

use App\Models\IngredientCate;

class IngredientCateRepository extends BaseRepository
{
    public function __construct(private IngredientCate $ingredientCate)
    {
        parent::__construct($ingredientCate);
    }
}
