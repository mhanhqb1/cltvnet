<?php

namespace App\Services\Cala\Order;

use App\Common\Definition\OrderStatus;
use App\Models\CalaOrder;
use App\Services\AbstractService;

class OrderInitialization extends AbstractService
{
    public function initOrder(): object
    {
        $newOrder = new CalaOrder();
        $newOrder->order_date = date('Y-m-d');
        $newOrder->status = OrderStatus::Pending;

        return $newOrder;
    }
}
