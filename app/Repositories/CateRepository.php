<?php

namespace App\Repositories;

use App\Common\Definition\PaginationDefs;
use App\Models\Cate;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class CateRepository extends BaseRepository
{
    public function __construct(private Cate $cate)
    {
        parent::__construct($cate);
    }

    public function fetchPaginator(array $searchConditions, int $perPage = PaginationDefs::LIMIT_DEFAULT): Paginator
    {
        return $this
            ->cate
            ->whereMultiConditions($searchConditions)
            ->orderBy('cate_id', 'desc')
            ->paginate($perPage)
            ->appends($searchConditions);
    }

    public function fetchOne(array $searchConditions): ?Cate
    {
        return $this
            ->cate
            ->whereMultiConditions($searchConditions)
            ->firstOrFail();
    }

    public function fetchAll(array $searchConditions): Collection
    {
        return $this
            ->cate
            ->whereMultiConditions($searchConditions)
            ->get();
    }
}
