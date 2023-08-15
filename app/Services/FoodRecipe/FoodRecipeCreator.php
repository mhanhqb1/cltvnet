<?php

namespace App\Services\FoodRecipe;

use App\Exceptions\ServiceException;
use App\Models\FoodRecipe;
use App\Repositories\FoodRecipeRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class FoodRecipeCreator extends AbstractFinder
{
    public function __construct(private FoodRecipeRepository $foodRecipeRepository)
    {
        parent::__construct($foodRecipeRepository);
    }

    public function save(array $params): FoodRecipe
    {
        try {
            return $this->foodRecipeRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
