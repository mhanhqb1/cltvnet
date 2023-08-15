<?php

namespace App\Services\MenuFood;

use App\Exceptions\ServiceException;
use App\Repositories\MenuFoodRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class MenuFoodDelete extends AbstractFinder
{
    public function __construct(private MenuFoodRepository $menuFoodRepository)
    {
        parent::__construct($menuFoodRepository);
    }

    public function deleteByConditions(array $conditions): int
    {
        try {
            return $this->menuFoodRepository->deleteByConditions($conditions);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
