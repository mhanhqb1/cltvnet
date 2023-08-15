<?php

namespace App\Services\Cala\Order;

use App\Exceptions\ServiceException;
use App\Models\CalaOrder;
use App\Repositories\Cala\OrderRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class OrderCreator extends AbstractFinder
{
    public function __construct(private OrderRepository $orderRepository)
    {
        parent::__construct($orderRepository);
    }

    public function save(array $params): CalaOrder
    {
        try {
            return $this->orderRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
