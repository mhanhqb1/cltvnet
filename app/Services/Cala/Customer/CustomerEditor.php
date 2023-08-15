<?php

namespace App\Services\Cala\Customer;

use App\Exceptions\ServiceException;
use App\Models\CalaCustomer;
use App\Repositories\Cala\CustomerRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class CustomerEditor extends AbstractFinder
{
    public function __construct(private CustomerRepository $customerRepository)
    {
        parent::__construct($customerRepository);
    }

    public function update(CalaCustomer $customer, array $params)
    {
        try {
            return $this->customerRepository->update($customer->customer_id, $params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
