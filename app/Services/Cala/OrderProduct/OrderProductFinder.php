<?php

namespace App\Services\Cala\OrderProduct;

use App\Exceptions\ServiceException;
use App\Repositories\Cala\OrderProductRepository;
use App\Services\AbstractFinder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class OrderProductFinder extends AbstractFinder
{
    public function __construct(private OrderProductRepository $orderProductRepository)
    {
        parent::__construct($orderProductRepository);
    }

    public function getAll(array $conditions): Collection
    {
        try {
            return $this->orderProductRepository->fetchAll($conditions);
        } catch (\Throwable $e) {
            $errorMessage = $e->getMessage();
            Log::error($errorMessage);
            throw new ServiceException($errorMessage);
        }
    }
}
