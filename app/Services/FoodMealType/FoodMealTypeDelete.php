<?php

namespace App\Services\FoodMealType;

use App\Exceptions\ServiceException;
use App\Repositories\FoodMealTypeRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class FoodMealTypeDelete extends AbstractFinder
{
    public function __construct(private FoodMealTypeRepository $foodMealTypeRepository)
    {
        parent::__construct($foodMealTypeRepository);
    }

    public function deleteByConditions(array $conditions): int
    {
        try {
            return $this->foodMealTypeRepository->deleteByConditions($conditions);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
