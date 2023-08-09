<?php

namespace App\Services\FoodCate;

use App\Exceptions\ServiceException;
use App\Repositories\FoodCateRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class FoodCateDelete extends AbstractFinder
{
    public function __construct(private FoodCateRepository $foodCateRepository)
    {
        parent::__construct($foodCateRepository);
    }

    public function deleteByConditions(array $conditions): int
    {
        try {
            return $this->foodCateRepository->deleteByConditions($conditions);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
