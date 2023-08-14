<?php

namespace App\Repositories\Cala;

use App\Common\Definition\PaginationDefs;
use App\Models\CalaOrderProduct;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class OrderProductRepository extends BaseRepository
{
    public function __construct(private CalaOrderProduct $orderProduct)
    {
        parent::__construct($orderProduct);
    }

    public function fetchPaginator(array $searchConditions, int $perPage = PaginationDefs::LIMIT_DEFAULT): Paginator
    {
        return $this
            ->orderProduct
            ->whereMultiConditions($searchConditions)
            ->orderBy('order_product_id', 'desc')
            ->paginate($perPage)
            ->appends($searchConditions);
    }

    public function fetchOne(array $searchConditions): ?CalaOrderProduct
    {
        return $this
            ->orderProduct
            ->whereMultiConditions($searchConditions)
            ->firstOrFail();
    }

    public function fetchAll(array $searchConditions): Collection
    {
        return $this
            ->orderProduct
            ->whereMultiConditions($searchConditions)
            ->get();
    }
}
