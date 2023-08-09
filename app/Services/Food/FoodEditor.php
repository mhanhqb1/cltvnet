<?php

namespace App\Services\Food;

use App\Exceptions\ServiceException;
use App\Models\Food;
use App\Repositories\FoodRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class FoodEditor extends AbstractFinder
{
    public function __construct(private FoodRepository $foodRepository)
    {
        parent::__construct($foodRepository);
    }

    public function update(Food $food, array $params)
    {
        try {
            return $this->foodRepository->update($food->food_id, $params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
