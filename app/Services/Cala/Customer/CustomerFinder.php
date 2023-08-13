<?php

namespace App\Services\Cala\Customer;

use App\Models\CalaCustomer;
use App\Repositories\Cala\CustomerRepository;
use App\Services\AbstractFinder;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class CustomerFinder extends AbstractFinder
{
    public function __construct(private CustomerRepository $customerRepository)
    {
        parent::__construct($customerRepository);
    }

    public function getPaginator(array $conditions): Paginator
    {
        return $this
            ->customerRepository
            ->fetchPaginator($conditions);
    }

    public function getOne(array $conditions): ?CalaCustomer
    {
        return $this
            ->customerRepository
            ->fetchOne($conditions);
    }

    public function getAll(array $conditions, bool $inputFormat = false): mixed
    {
        $Customers = $this
            ->customerRepository
            ->fetchAll($conditions);
        if ($inputFormat) {
            $Customers = $this->inputFormat($Customers);
        }
        return $Customers;
    }

    public function inputFormat(Collection $customers): array
    {
        $data = [];
        foreach ($customers as $customer) {
            $data[$customer->customer_id] = $customer->name;
        }
        return $data;
    }
}
