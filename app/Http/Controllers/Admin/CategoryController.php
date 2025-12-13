<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\CategoryDataTable;
use App\Helpers\Reply;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Exception;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->with('status', 'parent')->render('admin.categories.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $type = $request->query('type');
        $categories = null;

        if ($type === 'subcategory') {
            $categories = $this->categoryService->getParentCategory();
        }

        return view('admin.categories.create', compact('type', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            $data = $request->validated();
            $this->categoryService->createProduct($data);
            return Reply::success('Category created successfully');
        } catch (Exception $e) {
            return Reply::error($e->getMessage());
        }
    }

    /**
     * edit
     */
    public function edit(Request $request, Category $category)
    {
        $type = $category->parent_id == null ? '' : 'subcategory';
        $categories = null;
        if ($type === 'subcategory') {
            $categories =$this->categoryService->getParentCategory();
        }
        return view('admin.categories.edit', compact('category', 'type', 'categories'));
    }

    /**
     * Update category
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $data = $request->validated();
            $this->categoryService->updateProduct($category, $data);

            return response()->json([
                'status' => 'success',
                'message' => 'Category updated successfully'
            ],201);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete category
     */
    public function destroy(Category $category)
    {
        try {
            $this->categoryService->deleteProduct($category);

            return response()->json([
                'status' => 'success',
                'message' => 'Category deleted successfully'
            ],201);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function subcategory(CategoryDataTable $dataTable){
        return $dataTable->with('status', 'child')->render('admin.categories.subcategory');
    }
}
