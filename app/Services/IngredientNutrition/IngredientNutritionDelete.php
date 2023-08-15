<?php

namespace App\Services\IngredientNutrition;

use App\Exceptions\ServiceException;
use App\Repositories\IngredientNutritionRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class IngredientNutritionDelete extends AbstractFinder
{
    public function __construct(private IngredientNutritionRepository $ingredientNutritionRepository)
    {
        parent::__construct($ingredientNutritionRepository);
    }

    public function deleteByConditions(array $conditions): int
    {
        try {
            return $this->ingredientNutritionRepository->deleteByConditions($conditions);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
