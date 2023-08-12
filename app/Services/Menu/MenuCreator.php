<?php

namespace App\Services\Menu;

use App\Exceptions\ServiceException;
use App\Models\Menu;
use App\Repositories\MenuRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class MenuCreator extends AbstractFinder
{
    public function __construct(private MenuRepository $menuRepository)
    {
        parent::__construct($menuRepository);
    }

    public function save(array $params): Menu
    {
        try {
            return $this->menuRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
