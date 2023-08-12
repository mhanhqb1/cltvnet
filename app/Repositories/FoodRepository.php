<?php

namespace App\Repositories;

use App\Common\Definition\PaginationDefs;
use App\Models\Food;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class FoodRepository extends BaseRepository
{
    public function __construct(private Food $food)
    {
        parent::__construct($food);
    }

    public function fetchPaginator(array $searchConditions, int $perPage = PaginationDefs::LIMIT_DEFAULT): Paginator
    {
        return $this
            ->food
            ->whereMultiConditions($searchConditions)
            ->orderBy('food_id', 'desc')
            ->paginate($perPage);
    }

    public function fetchOne(array $searchConditions): ?Food
    {
        return $this
            ->food
            ->with(['mealTypes', 'cates', 'recipes'])
            ->whereMultiConditions($searchConditions)
            ->firstOrFail();
    }

    public function fetchAll(array $searchConditions): Collection
    {
        return $this
            ->food
            ->whereMultiConditions($searchConditions)
            ->get();
    }
}
