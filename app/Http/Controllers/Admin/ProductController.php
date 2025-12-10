<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Models\Category;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sku' => 'required|unique:products',
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'cost_price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'description' => 'required'
        ]);

        $this->service->store($validated);

        return response()->json(['success' => true, 'message' => 'Product Created']);
    }

    public function edit($id)
    {
        $product = $this->service->edit($id);
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'sku' => 'required|unique:products,sku,' . $id,
            'name' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric',
            'cost_price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
        ]);

        $this->service->update($id, $validated);

        return response()->json(['success' => true, 'message' => 'Product Updated']);
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return response()->json(['success' => true, 'message' => 'Product Deleted']);
    }
}
