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

    public function getAllProducts()
    {
        return $this->categoryRepo->all();
    }

    public function createProduct(array $data)
    {
        return $this->categoryRepo->create($data);
    }

    public function updateProduct($id, array $data)
    {
        return $this->categoryRepo->update($id, $data);
    }

    public function deleteProduct($id)
    {
        return $this->categoryRepo->delete($id);
    }

    public function getProductsWithFields(array $fields)
    {
        return $this->categoryRepo->getWithFields($fields);
    }
}
