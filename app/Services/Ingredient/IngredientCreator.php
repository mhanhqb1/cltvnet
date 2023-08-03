<?php

namespace App\Services\Ingredient;

use App\Exceptions\ServiceException;
use App\Models\Ingredient;
use App\Repositories\IngredientRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class IngredientCreator extends AbstractFinder
{
    public function __construct(private IngredientRepository $ingredientRepository)
    {
        parent::__construct($ingredientRepository);
    }

    public function save(array $params): Ingredient
    {
        try {
            return $this->ingredientRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
