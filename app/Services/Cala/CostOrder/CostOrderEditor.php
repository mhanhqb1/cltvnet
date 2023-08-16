<?php

namespace App\Services\Cala\CostOrder;

use App\Exceptions\ServiceException;
use App\Models\CalaCostOrder;
use App\Repositories\Cala\CostOrderRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class CostOrderEditor extends AbstractFinder
{
    public function __construct(private CostOrderRepository $costOrderRepository)
    {
        parent::__construct($costOrderRepository);
    }

    public function update(CalaCostOrder $costOrder, array $params)
    {
        try {
            return $this->costOrderRepository->update($costOrder->cost_order_id, $params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
