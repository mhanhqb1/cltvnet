<?php

namespace App\Services\Food;

use App\Exceptions\ServiceException;
use App\Models\Food;
use App\Repositories\FoodRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class FoodCreator extends AbstractFinder
{
    public function __construct(private FoodRepository $foodRepository)
    {
        parent::__construct($foodRepository);
    }

    public function save(array $params): Food
    {
        try {
            return $this->foodRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
