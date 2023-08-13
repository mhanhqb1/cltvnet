<?php

namespace App\Repositories\Cala;

use App\Common\Definition\PaginationDefs;
use App\Models\CalaCustomer;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class CustomerRepository extends BaseRepository
{
    public function __construct(private CalaCustomer $customer)
    {
        parent::__construct($customer);
    }

    public function fetchPaginator(array $searchConditions, int $perPage = PaginationDefs::LIMIT_DEFAULT): Paginator
    {
        return $this
            ->customer
            ->whereMultiConditions($searchConditions)
            ->orderBy('customer_id', 'desc')
            ->paginate($perPage)
            ->appends($searchConditions);
    }

    public function fetchOne(array $searchConditions): ?CalaCustomer
    {
        return $this
            ->customer
            ->whereMultiConditions($searchConditions)
            ->firstOrFail();
    }

    public function fetchAll(array $searchConditions): Collection
    {
        return $this
            ->customer
            ->whereMultiConditions($searchConditions)
            ->get();
    }
}
