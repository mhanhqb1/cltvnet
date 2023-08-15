<?php

namespace App\Services\MenuFood;

use App\Exceptions\ServiceException;
use App\Models\MenuFood;
use App\Repositories\MenuFoodRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class MenuFoodCreator extends AbstractFinder
{
    public function __construct(private MenuFoodRepository $menuFoodRepository)
    {
        parent::__construct($menuFoodRepository);
    }

    public function save(array $params): MenuFood
    {
        try {
            return $this->menuFoodRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
