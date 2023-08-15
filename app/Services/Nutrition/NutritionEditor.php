<?php

namespace App\Services\Nutrition;

use App\Exceptions\ServiceException;
use App\Models\Nutrition;
use App\Repositories\NutritionRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class NutritionEditor extends AbstractFinder
{
    public function __construct(private NutritionRepository $nutritionRepository)
    {
        parent::__construct($nutritionRepository);
    }

    public function update(Nutrition $nutrition, array $params)
    {
        try {
            return $this->nutritionRepository->update($nutrition->nutrition_id, $params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
