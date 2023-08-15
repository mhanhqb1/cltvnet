<?php

namespace App\Services\Menu;

use App\Exceptions\ServiceException;
use App\Models\Menu;
use App\Repositories\MenuRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class MenuDelete extends AbstractFinder
{
    public function __construct(private MenuRepository $menuRepository)
    {
        parent::__construct($menuRepository);
    }

    public function destroy(Menu $menu): int
    {
        try {
            return $this->menuRepository->delete($menu->menu_id);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('delete_failed'));
        }
    }
}
