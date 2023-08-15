<?php

namespace App\Services\FoodMealType;

use App\Exceptions\ServiceException;
use App\Models\FoodMealType;
use App\Repositories\FoodMealTypeRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class FoodMealTypeCreator extends AbstractFinder
{
    public function __construct(private FoodMealTypeRepository $foodMealTypeRepository)
    {
        parent::__construct($foodMealTypeRepository);
    }

    public function save(array $params): FoodMealType
    {
        try {
            return $this->foodMealTypeRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
