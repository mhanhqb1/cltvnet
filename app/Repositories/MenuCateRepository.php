<?php

namespace App\Repositories;

use App\Models\MenuCate;

class MenuCateRepository extends BaseRepository
{
    public function __construct(private MenuCate $menuCate)
    {
        parent::__construct($menuCate);
    }
}
