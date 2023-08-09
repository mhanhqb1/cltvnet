<?php

namespace App\Services\Food;

use App\Exceptions\ServiceException;
use App\Models\Food;
use App\Repositories\FoodRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class FoodDelete extends AbstractFinder
{
    public function __construct(private FoodRepository $foodRepository)
    {
        parent::__construct($foodRepository);
    }

    public function destroy(Food $food): int
    {
        try {
            return $this->foodRepository->delete($food->food_id);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('delete_failed'));
        }
    }
}
