<?php

namespace App\Services\Cala\Product;

use App\Exceptions\ServiceException;
use App\Models\CalaProduct;
use App\Repositories\Cala\ProductRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class ProductEditor extends AbstractFinder
{
    public function __construct(private ProductRepository $productRepository)
    {
        parent::__construct($productRepository);
    }

    public function update(CalaProduct $product, array $params)
    {
        try {
            return $this->productRepository->update($product->product_id, $params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
