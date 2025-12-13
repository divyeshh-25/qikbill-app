<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Services\ProductService;
use App\Models\Category;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.products.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $validated = $request->validated();
        $this->service->store($validated);
        return response()->json(['success' => true, 'message' => 'Product Created']);
    }

    public function edit($id)
    {
        $product = $this->service->edit($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        $validated = $request->validated();
        $this->service->update($id, $validated);
        return response()->json(['success' => true, 'message' => 'Product Updated']);
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return response()->json(['success' => true, 'message' => 'Product Deleted']);
    }
}
