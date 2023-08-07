<?php

namespace App\Services\Ingredient;

use App\Exceptions\ServiceException;
use App\Models\Ingredient;
use App\Repositories\IngredientRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class IngredientDelete extends AbstractFinder
{
    public function __construct(private IngredientRepository $ingredientRepository)
    {
        parent::__construct($ingredientRepository);
    }

    public function destroy(Ingredient $ingredient): int
    {
        try {
            return $this->ingredientRepository->delete($ingredient->ingredient_id);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('delete_failed'));
        }
    }
}
