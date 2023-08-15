<?php

namespace App\Services\FoodCate;

use App\Exceptions\ServiceException;
use App\Models\FoodCate;
use App\Repositories\FoodCateRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class FoodCateCreator extends AbstractFinder
{
    public function __construct(private FoodCateRepository $foodCateRepository)
    {
        parent::__construct($foodCateRepository);
    }

    public function save(array $params): FoodCate
    {
        try {
            return $this->foodCateRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
