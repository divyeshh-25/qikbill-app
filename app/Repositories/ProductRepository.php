<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        return Product::get();
    }

    public function find($id)
    {
        return Product::findOrFail($id);
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update($id, array $data)
    {
        $product = $this->find($id);
        return $product->update($data);
    }

    public function delete($id)
    {
        $product = $this->find($id);
        if($product->image){
            unlink('storage/products/'.$product->image);
        }
        return $product->delete();
    }
}
