<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function find($id)
    {
        return Category::findOrFail($id);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update($category, array $data)
    {
        $category->update($data);
        return $category;
    }

    public function delete($category)
    {
        return $category->delete();
    }

     public function getWithFields(array $fields)
     {
        return Category::where('status','1')->select($fields)->get();
     }

     public function getParentCategory()
     {
        return Category::whereNull('parent_id')->get();
     }
}
