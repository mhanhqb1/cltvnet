<?php

namespace App\Services\Menu;

use App\Exceptions\ServiceException;
use App\Models\Menu;
use App\Repositories\MenuRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class MenuEditor extends AbstractFinder
{
    public function __construct(private MenuRepository $menuRepository)
    {
        parent::__construct($menuRepository);
    }

    public function update(Menu $menu, array $params)
    {
        try {
            return $this->menuRepository->update($menu->menu_id, $params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
