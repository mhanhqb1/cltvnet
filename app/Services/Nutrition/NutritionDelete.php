<?php

namespace App\Services\Nutrition;

use App\Exceptions\ServiceException;
use App\Models\Nutrition;
use App\Repositories\NutritionRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class NutritionDelete extends AbstractFinder
{
    public function __construct(private NutritionRepository $nutritionRepository)
    {
        parent::__construct($nutritionRepository);
    }

    public function destroy(Nutrition $nutrition): int
    {
        try {
            return $this->nutritionRepository->delete($nutrition->nutrition_id);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }

    }
}
