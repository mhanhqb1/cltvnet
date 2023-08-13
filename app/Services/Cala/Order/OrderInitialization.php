<?php

namespace App\Services\Cala\Order;

use App\Models\CalaOrder;
use App\Services\AbstractService;

class OrderInitialization extends AbstractService
{
    public function initOrder(): object
    {
        $newOrder = new CalaOrder();

        return $newOrder;
    }
}
