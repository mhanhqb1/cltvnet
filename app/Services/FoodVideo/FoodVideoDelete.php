<?php

namespace App\Services\FoodVideo;

use App\Exceptions\ServiceException;
use App\Repositories\FoodVideoRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class FoodVideoDelete extends AbstractFinder
{
    public function __construct(private FoodVideoRepository $foodVideoRepository)
    {
        parent::__construct($foodVideoRepository);
    }

    public function deleteByConditions(array $conditions): int
    {
        try {
            return $this->foodVideoRepository->deleteByConditions($conditions);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
