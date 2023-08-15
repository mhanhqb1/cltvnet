<?php

namespace App\Services\IngredientCate;

use App\Exceptions\ServiceException;
use App\Repositories\IngredientCateRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class IngredientCateDelete extends AbstractFinder
{
    public function __construct(private IngredientCateRepository $ingredientCateRepository)
    {
        parent::__construct($ingredientCateRepository);
    }

    public function deleteByConditions(array $conditions): int
    {
        try {
            return $this->ingredientCateRepository->deleteByConditions($conditions);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
