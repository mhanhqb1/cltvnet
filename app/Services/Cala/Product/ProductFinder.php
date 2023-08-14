<?php

namespace App\Services\Cala\Product;

use App\Models\CalaProduct;
use App\Repositories\Cala\ProductRepository;
use App\Services\AbstractFinder;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class ProductFinder extends AbstractFinder
{
    public function __construct(private ProductRepository $productRepository)
    {
        parent::__construct($productRepository);
    }

    public function getPaginator(array $conditions): Paginator
    {
        return $this
            ->productRepository
            ->fetchPaginator($conditions);
    }

    public function getOne(array $conditions): ?CalaProduct
    {
        return $this
            ->productRepository
            ->fetchOne($conditions);
    }

    public function getAll(array $conditions, bool $inputFormat = false): mixed
    {
        $products = $this
            ->productRepository
            ->fetchAll($conditions);
        if ($inputFormat) {
            $products = $this->inputFormat($products);
        }
        return $products;
    }

    public function inputFormat(Collection $products): array
    {
        $data = [];
        foreach ($products as $product) {
            $data[$product->product_id] = $product->name;
        }
        return $data;
    }
}
