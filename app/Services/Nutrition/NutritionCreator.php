<?php

namespace App\Services\Nutrition;

use App\Exceptions\ServiceException;
use App\Models\Nutrition;
use App\Repositories\NutritionRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class NutritionCreator extends AbstractFinder
{
    public function __construct(private NutritionRepository $nutritionRepository)
    {
        parent::__construct($nutritionRepository);
    }

    public function save(array $params): Nutrition
    {
        try {
            return $this->nutritionRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
