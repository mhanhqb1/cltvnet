<?php

namespace App\Services\Cala\Order;

use App\Exceptions\ServiceException;
use App\Models\CalaOrder;
use App\Repositories\Cala\OrderRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class OrderDelete extends AbstractFinder
{
    public function __construct(private OrderRepository $orderRepository)
    {
        parent::__construct($orderRepository);
    }

    public function destroy(CalaOrder $order): int
    {
        try {
            return $this->orderRepository->delete($order->order_id);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
