<?php

namespace App\Services\IngredientNutrition;

use App\Exceptions\ServiceException;
use App\Models\IngredientNutrition;
use App\Repositories\IngredientNutritionRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class IngredientNutritionCreator extends AbstractFinder
{
    public function __construct(private IngredientNutritionRepository $ingredientNutritionRepository)
    {
        parent::__construct($ingredientNutritionRepository);
    }

    public function save(array $params): IngredientNutrition
    {
        try {
            return $this->ingredientNutritionRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
