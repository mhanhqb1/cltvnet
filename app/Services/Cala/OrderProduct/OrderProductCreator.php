<?php

namespace App\Services\Cala\OrderProduct;

use App\Exceptions\ServiceException;
use App\Models\CalaOrderProduct;
use App\Repositories\Cala\OrderProductRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class OrderProductCreator extends AbstractFinder
{
    public function __construct(private OrderProductRepository $orderProductRepository)
    {
        parent::__construct($orderProductRepository);
    }

    public function save(array $params): CalaOrderProduct
    {
        try {
            return $this->orderProductRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
