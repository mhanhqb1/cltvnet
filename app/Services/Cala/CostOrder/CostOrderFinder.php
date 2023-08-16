<?php

namespace App\Services\Cala\CostOrder;

use App\Models\CalaCostOrder;
use App\Repositories\Cala\CostOrderRepository;
use App\Services\AbstractFinder;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class CostOrderFinder extends AbstractFinder
{
    public function __construct(private CostOrderRepository $costOrderRepository)
    {
        parent::__construct($costOrderRepository);
    }

    public function getPaginator(array $conditions): Paginator
    {
        return $this
            ->costOrderRepository
            ->fetchPaginator($conditions);
    }

    public function getOne(array $conditions): ?CalaCostOrder
    {
        return $this
            ->costOrderRepository
            ->fetchOne($conditions);
    }
}
