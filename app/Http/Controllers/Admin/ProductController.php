<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Services\ProductService;
use App\Services\CategoryService;

class ProductController extends Controller
{
    protected $service;
    protected $categoryService;

    public function __construct(ProductService $service,CategoryService $categoryService)
    {
        $this->service = $service;
        $this->categoryService = $categoryService;
    }

    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.products.index');
    }

    public function create()
    {
        $categories = $this->categoryService->getAllCategories();
        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $validated = $request->validated();
        $this->service->store($validated);
        return to_route('admin.products.index')->with('success','Product created successfully');
    }

    public function edit($id)
    {
        $product = $this->service->edit($id);
        $categories = $this->categoryService->getAllCategories();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        $validated = $request->validated();
        $this->service->update($id, $validated);
        return to_route('admin.products.index')->with('success','Product Updated successfully');
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return response()->json(['success' => true, 'message' => 'Product Deleted']);
    }
}
