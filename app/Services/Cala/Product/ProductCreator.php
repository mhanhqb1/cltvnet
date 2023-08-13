<?php

namespace App\Services\Cala\Product;

use App\Exceptions\ServiceException;
use App\Models\CalaProduct;
use App\Repositories\Cala\ProductRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class ProductCreator extends AbstractFinder
{
    public function __construct(private ProductRepository $productRepository)
    {
        parent::__construct($productRepository);
    }

    public function save(array $params): CalaProduct
    {
        try {
            return $this->productRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
