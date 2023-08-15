<?php

namespace App\Services\Cala\Customer;

use App\Exceptions\ServiceException;
use App\Models\CalaCustomer;
use App\Repositories\Cala\CustomerRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class CustomerDelete extends AbstractFinder
{
    public function __construct(private CustomerRepository $customerRepository)
    {
        parent::__construct($customerRepository);
    }

    public function destroy(CalaCustomer $customer): int
    {
        try {
            return $this->customerRepository->delete($customer->customer_id);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
    }
}
