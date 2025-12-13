<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Str;

class ProductService
{
    protected $repo;

    public function __construct(ProductRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function list()
    {
        return $this->repo->all();
    }

    public function store(array $data)
    {
        if($data['image']){
            $image = $data['image'];
            $imageName = Str::slug($data['name']).'-'.time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('products', $imageName, 'public');
            $data['image'] = $imageName;
        }
        return $this->repo->create($data);
    }

    public function edit($id)
    {
        return $this->repo->find($id);
    }

    public function update($id, array $data)
    {
        if(isset($data['image']) && $data['image']){
            $image = $data['image'];
            $imageName = Str::slug($data['name']).'-'.time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('products', $imageName, 'public');
            $data['image'] = $imageName;
        }else{
            unset($data['image']);
        }
        return $this->repo->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->repo->delete($id);
    }
}
