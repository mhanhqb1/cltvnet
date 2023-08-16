<?php

namespace App\Services\Cala\CostOrder;

use App\Exceptions\ServiceException;
use App\Models\CalaCostOrder;
use App\Repositories\Cala\CostOrderRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class CostOrderCreator extends AbstractFinder
{
    public function __construct(private CostOrderRepository $costOrderRepository)
    {
        parent::__construct($costOrderRepository);
    }

    public function save(array $params): CalaCostOrder
    {
        try {
            return $this->costOrderRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
