<?php

namespace App\Services\Cate;

use App\Models\Cate;
use App\Services\AbstractService;

class CateInitialization extends AbstractService
{
    public function initCate(): object
    {
        $newCate = new Cate();

        return $newCate;
    }
}
