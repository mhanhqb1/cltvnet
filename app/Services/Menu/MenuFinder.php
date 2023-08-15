<?php

namespace App\Services\Menu;

use App\Models\Menu;
use App\Repositories\MenuRepository;
use App\Services\AbstractFinder;
use Illuminate\Contracts\Pagination\Paginator;

class MenuFinder extends AbstractFinder
{
    public function __construct(private MenuRepository $menuRepository)
    {
        parent::__construct($menuRepository);
    }

    public function getPaginator(array $conditions): Paginator
    {
        return $this
            ->menuRepository
            ->fetchPaginator($conditions);
    }

    public function getOne(array $conditions): ?Menu
    {
        return $this
            ->menuRepository
            ->fetchOne($conditions);
    }
}
