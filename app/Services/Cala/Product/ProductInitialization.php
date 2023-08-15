<?php

namespace App\Services\Cala\Product;

use App\Models\CalaProduct;
use App\Services\AbstractService;

class ProductInitialization extends AbstractService
{
    public function initProduct(): object
    {
        $newProduct = new CalaProduct();

        return $newProduct;
    }
}
