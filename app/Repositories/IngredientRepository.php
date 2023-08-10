<?php

namespace App\Repositories;

use App\Common\Definition\PaginationDefs;
use App\Models\Ingredient;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class IngredientRepository extends BaseRepository
{
    public function __construct(private Ingredient $ingredient)
    {
        parent::__construct($ingredient);
    }

    public function fetchPaginator(array $searchConditions, int $perPage = PaginationDefs::LIMIT_DEFAULT): Paginator
    {
        return $this
            ->ingredient
            ->with(['cates', 'nutritions'])
            ->whereMultiConditions($searchConditions)
            ->orderBy('ingredient_id', 'desc')
            ->paginate($perPage);
    }

    public function fetchOne(array $searchConditions): ?Ingredient
    {
        return $this
            ->ingredient
            ->with(['cates', 'nutritions'])
            ->whereMultiConditions($searchConditions)
            ->firstOrFail();
    }

    public function fetchAll(array $searchConditions): Collection
    {
        return $this
            ->ingredient
            ->whereMultiConditions($searchConditions)
            ->get();
    }
}
