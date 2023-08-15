<?php

namespace App\Services\MenuCate;

use App\Exceptions\ServiceException;
use App\Repositories\MenuCateRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class MenuCateDelete extends AbstractFinder
{
    public function __construct(private MenuCateRepository $menuCateRepository)
    {
        parent::__construct($menuCateRepository);
    }

    public function deleteByConditions(array $conditions): int
    {
        try {
            return $this->menuCateRepository->deleteByConditions($conditions);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
