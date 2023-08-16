<?php

namespace App\Services\Cala\CostOrder;

use App\Models\CalaCostOrder;
use App\Services\AbstractService;

class CostOrderInitialization extends AbstractService
{
    public function initCostOrder(): object
    {
        $newCostOrder = new CalaCostOrder();
        $newCostOrder->CostOrder_date = date('Y-m-d');

        return $newCostOrder;
    }
}
