<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\Interfaces\CustomerRepositoryInterface;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function all()
    {
        return Customer::latest()->get();
    }

    public function find($id): ?Customer
    {
        return Customer::find($id);
    }

    public function create(array $data): Customer
    {
        return Customer::create($data);
    }

    public function update($id, array $data): Customer
    {
        $customer = $this->find($id);
        $customer->update($data);
        return $customer;
    }

    public function delete($id): bool
    {
        $customer = $this->find($id);
        return $customer->delete();
    }
}
