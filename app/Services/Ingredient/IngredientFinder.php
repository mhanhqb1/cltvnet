<?php

namespace App\Services\Ingredient;

use App\Models\Ingredient;
use App\Repositories\IngredientRepository;
use App\Services\AbstractFinder;
use Illuminate\Contracts\Pagination\Paginator;

class IngredientFinder extends AbstractFinder
{
    public function __construct(private IngredientRepository $ingredientRepository)
    {
        parent::__construct($ingredientRepository);
    }

    public function getPaginator(array $conditions): Paginator
    {
        return $this
            ->ingredientRepository
            ->fetchPaginator($conditions);
    }

    public function getOne(array $conditions): ?Ingredient
    {
        return $this
            ->ingredientRepository
            ->fetchOne($conditions);
    }
}
