<?php

namespace App\Services;

use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryService
{
    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function getAllCategories()
    {
        return $this->categoryRepo->all();
    }

    public function createProduct(array $data)
    {
        return $this->categoryRepo->create($data);
    }

    public function updateProduct($category, array $data)
    {
        return $this->categoryRepo->update($category, $data);
    }

    public function deleteProduct($category)
    {
        return $this->categoryRepo->delete($category);
    }

    public function getProductsWithFields(array $fields)
    {
        return $this->categoryRepo->getWithFields($fields);
    }

    public function getParentCategory(){
       return $this->categoryRepo->getParentCategory();
    }
}
