<?php

namespace App\Repositories;

use App\Common\Definition\PaginationDefs;
use App\Models\Menu;
use Illuminate\Contracts\Pagination\Paginator;

class MenuRepository extends BaseRepository
{
    public function __construct(private Menu $menu)
    {
        parent::__construct($menu);
    }

    public function fetchPaginator(array $searchConditions, int $perPage = PaginationDefs::LIMIT_DEFAULT): Paginator
    {
        return $this
            ->menu
            ->whereMultiConditions($searchConditions)
            ->orderBy('menu_id', 'desc')
            ->paginate($perPage);
    }

    public function fetchOne(array $searchConditions): ?Menu
    {
        return $this
            ->menu
            ->whereMultiConditions($searchConditions)
            ->firstOrFail();
    }
}
