<?php

namespace App\Services\Cala\CostOrder;

use App\Exceptions\ServiceException;
use App\Models\CalaCostOrder;
use App\Repositories\Cala\CostOrderRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class CostOrderDelete extends AbstractFinder
{
    public function __construct(private CostOrderRepository $costOrderRepository)
    {
        parent::__construct($costOrderRepository);
    }

    public function destroy(CalaCostOrder $costOrder): int
    {
        try {
            return $this->costOrderRepository->delete($costOrder->cost_order_id);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
