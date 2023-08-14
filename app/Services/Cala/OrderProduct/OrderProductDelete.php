<?php

namespace App\Services\Cala\OrderProduct;

use App\Exceptions\ServiceException;
use App\Repositories\Cala\OrderProductRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class OrderProductDelete extends AbstractFinder
{
    public function __construct(private OrderProductRepository $orderProductRepository)
    {
        parent::__construct($orderProductRepository);
    }

    public function deleteByConditions(array $conditions): int
    {
        try {
            return $this->orderProductRepository->deleteByConditions($conditions);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
