<?php

namespace App\Services\Menu;

use App\Models\Menu;
use App\Services\AbstractService;

class MenuInitialization extends AbstractService
{
    public function initMenu(): object
    {
        $newMenu = new Menu();

        return $newMenu;
    }
}
