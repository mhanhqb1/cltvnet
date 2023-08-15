<?php

namespace App\Services\Cala\Order;

use App\Exceptions\ServiceException;
use App\Models\CalaOrder;
use App\Repositories\Cala\OrderRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class OrderEditor extends AbstractFinder
{
    public function __construct(private OrderRepository $orderRepository)
    {
        parent::__construct($orderRepository);
    }

    public function update(CalaOrder $order, array $params)
    {
        try {
            return $this->orderRepository->update($order->order_id, $params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
