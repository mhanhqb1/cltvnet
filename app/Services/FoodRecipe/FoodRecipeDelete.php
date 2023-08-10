<?php

namespace App\Services\FoodRecipe;

use App\Exceptions\ServiceException;
use App\Repositories\FoodRecipeRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class FoodRecipeDelete extends AbstractFinder
{
    public function __construct(private FoodRecipeRepository $foodRecipeRepository)
    {
        parent::__construct($foodRecipeRepository);
    }

    public function deleteByConditions(array $conditions): int
    {
        try {
            return $this->foodRecipeRepository->deleteByConditions($conditions);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
