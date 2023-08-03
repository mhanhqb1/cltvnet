<?php

namespace App\Repositories;

use App\Common\Definition\PaginationDefs;
use App\Models\IngredientCate;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class IngredientCateRepository extends BaseRepository
{
    public function __construct(private IngredientCate $ingredientCate)
    {
        parent::__construct($ingredientCate);
    }
}
