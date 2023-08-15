<?php

namespace App\Repositories\Cala;

use App\Common\Definition\PaginationDefs;
use App\Models\CalaProduct;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository extends BaseRepository
{
    public function __construct(private CalaProduct $product)
    {
        parent::__construct($product);
    }

    public function fetchPaginator(array $searchConditions, int $perPage = PaginationDefs::LIMIT_DEFAULT): Paginator
    {
        return $this
            ->product
            ->whereMultiConditions($searchConditions)
            ->orderBy('product_id', 'desc')
            ->paginate($perPage)
            ->appends($searchConditions);
    }

    public function fetchOne(array $searchConditions): ?CalaProduct
    {
        return $this
            ->product
            ->whereMultiConditions($searchConditions)
            ->firstOrFail();
    }

    public function fetchAll(array $searchConditions): Collection
    {
        return $this
            ->product
            ->whereMultiConditions($searchConditions)
            ->get();
    }
}
