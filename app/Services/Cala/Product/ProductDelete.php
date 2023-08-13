<?php

namespace App\Services\Cala\Product;

use App\Exceptions\ServiceException;
use App\Models\CalaProduct;
use App\Repositories\Cala\ProductRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class ProductDelete extends AbstractFinder
{
    public function __construct(private ProductRepository $productRepository)
    {
        parent::__construct($productRepository);
    }

    public function destroy(CalaProduct $product): int
    {
        try {
            return $this->productRepository->delete($product->product_id);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
