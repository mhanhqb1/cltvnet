<?php

namespace App\Services\Cala\Customer;

use App\Models\CalaCustomer;
use App\Services\AbstractService;

class CustomerInitialization extends AbstractService
{
    public function initCustomer(): object
    {
        $newCustomer = new CalaCustomer();

        return $newCustomer;
    }
}
