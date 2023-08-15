<?php

namespace App\Services\Cala\Customer;

use App\Exceptions\ServiceException;
use App\Models\CalaCustomer;
use App\Repositories\Cala\CustomerRepository;
use App\Services\AbstractFinder;
use Illuminate\Support\Facades\Log;

class CustomerCreator extends AbstractFinder
{
    public function __construct(private CustomerRepository $customerRepository)
    {
        parent::__construct($customerRepository);
    }

    public function save(array $params): CalaCustomer
    {
        try {
            return $this->customerRepository->create($params);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new ServiceException(__('create_failed'));
        }

    }
}
