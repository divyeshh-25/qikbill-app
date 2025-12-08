<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CustomerDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Repositories\Interfaces\CustomerRepositoryInterface;

class CustomerController extends Controller
{
    protected $customers;

    public function __construct(CustomerRepositoryInterface $customers)
    {
        $this->customers = $customers;
    }

    public function index(CustomerDataTable $dataTable)
    {
        return $dataTable->render('admin.customers.index');
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(CustomerRequest $request)
    {
        $this->customers->create($request->validated());

        return redirect()->route('admin.customers.index')
            ->with('success', 'Customer created successfully');
    }

    public function edit($id)
    {
        $customer = $this->customers->find($id);
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(CustomerRequest $request, $id)
    {
        $this->customers->update($id, $request->validated());

        return redirect()->route('admin.customers.index')
            ->with('success', 'Customer updated successfully');
    }

    public function destroy($id)
    {
        $this->customers->delete($id);

        return back()->with('success', 'Customer deleted successfully');
    }
}
