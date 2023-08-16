<?php

namespace App\Repositories\Cala;

use App\Common\Definition\PaginationDefs;
use App\Models\CalaCostOrder;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class CostOrderRepository extends BaseRepository
{
    public function __construct(private CalaCostOrder $costOrder)
    {
        parent::__construct($costOrder);
    }

    public function fetchPaginator(array $searchConditions, int $perPage = PaginationDefs::LIMIT_DEFAULT): Paginator
    {
        return $this
            ->costOrder
            ->whereMultiConditions($searchConditions)
            ->orderBy('cost_order_id', 'desc')
            ->paginate($perPage)
            ->appends($searchConditions);
    }

    public function fetchOne(array $searchConditions): ?CalaCostOrder
    {
        return $this
            ->costOrder
            ->whereMultiConditions($searchConditions)
            ->firstOrFail();
    }

    public function fetchAll(array $searchConditions): Collection
    {
        return $this
            ->costOrder
            ->whereMultiConditions($searchConditions)
            ->get();
    }
}
