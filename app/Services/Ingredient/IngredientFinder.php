<?php

namespace App\Services\Ingredient;

use App\Models\Ingredient;
use App\Repositories\IngredientRepository;
use App\Services\AbstractFinder;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

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

    public function getAll(array $conditions, bool $inputFormat = false): Collection|array
    {
        $ingredients = $this
            ->ingredientRepository
            ->fetchAll($conditions);
        if ($inputFormat) {
            $ingredients = $this->inputFormat($ingredients);
        }
        return $ingredients;
    }

    public function inputFormat(Collection $ingredients): array
    {
        $data = [];
        foreach ($ingredients as $ingredient) {
            $data[$ingredient->ingredient_id] = $ingredient->getNameForRecipe();
        }
        return $data;
    }
}
