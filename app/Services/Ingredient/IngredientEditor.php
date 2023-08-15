<?php

namespace App\Services\Ingredient;

use App\Exceptions\ServiceException;
use App\Models\Ingredient;
use App\Repositories\IngredientRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class IngredientEditor extends AbstractFinder
{
    public function __construct(private IngredientRepository $ingredientRepository)
    {
        parent::__construct($ingredientRepository);
    }

    public function update(Ingredient $ingredient, array $params)
    {
        try {
            return $this->ingredientRepository->update($ingredient->ingredient_id, $params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
