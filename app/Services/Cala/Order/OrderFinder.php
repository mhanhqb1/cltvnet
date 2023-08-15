<?php

namespace App\Services\Cala\Order;

use App\Models\CalaOrder;
use App\Repositories\Cala\OrderRepository;
use App\Services\AbstractFinder;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class OrderFinder extends AbstractFinder
{
    public function __construct(private OrderRepository $orderRepository)
    {
        parent::__construct($orderRepository);
    }

    public function getPaginator(array $conditions): Paginator
    {
        return $this
            ->orderRepository
            ->fetchPaginator($conditions);
    }

    public function getOne(array $conditions): ?CalaOrder
    {
        return $this
            ->orderRepository
            ->fetchOne($conditions);
    }
}
