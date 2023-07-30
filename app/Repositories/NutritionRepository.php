<?php

namespace App\Repositories;

use App\Common\Definition\PaginationDefs;
use App\Models\Nutrition;
use Illuminate\Contracts\Pagination\Paginator;

class NutritionRepository extends BaseRepository
{
    public function __construct(private Nutrition $nutrition)
    {
        parent::__construct($nutrition);
    }

    public function fetchPaginator(array $searchConditions, int $perPage = PaginationDefs::LIMIT_DEFAULT): Paginator
    {
        return $this
            ->nutrition
            ->whereMultiConditions($searchConditions)
            ->orderBy('nutrition_id', 'desc')
            ->paginate($perPage);
    }

    public function fetchOne(array $searchConditions): ?Nutrition
    {
        return $this
            ->nutrition
            ->whereMultiConditions($searchConditions)
            ->firstOrFail();
    }
}
