<?php

namespace App\Repositories\Interfaces;

use App\Models\Customer;

interface CustomerRepositoryInterface
{
    public function all();
    public function find($id): ?Customer;
    public function create(array $data): Customer;
    public function update($id, array $data): Customer;
    public function delete($id): bool;
}
