<?php

namespace App\Services\IngredientCate;

use App\Exceptions\ServiceException;
use App\Models\IngredientCate;
use App\Repositories\IngredientCateRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class IngredientCateCreator extends AbstractFinder
{
    public function __construct(private IngredientCateRepository $ingredientCateRepository)
    {
        parent::__construct($ingredientCateRepository);
    }

    public function save(array $params): IngredientCate
    {
        try {
            return $this->ingredientCateRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
