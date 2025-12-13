<?php

namespace App\Models\Traits;


use App\Models\Category;

trait Product
{
    public function getActionAttribute()
    {
        $editUrl =route('admin.products.edit', [$this->id, 'type=subcategory']);
        $deleteUrl = route('admin.products.destroy', $this->id);

        return '<div class="edit-delete-action">
            <a class="me-2 p-2"  data-url="' . $editUrl . '"
                        data-type="add"
                        data-title="Edit Product"
                        data-ajax-popup="true">
                <i data-feather="edit" class="feather-edit"></i>
            </a>

        <a href="javascript:void(0);"
           onclick="deleteHandler(\'' . $deleteUrl . '\')"
           class="p-2 delete-btn">
            <i data-feather="trash-2" class="feather-trash-2"></i>
        </a>';
    }

    public function getStatusBadgeAttribute()
    {
        if ($this->status == "1") {
            return '<span class="badge bg-success fw-medium fs-10">Active</span>';
        } else {
            return '<span class="badge bg-danger fw-medium fs-10">Inactive</span>';
        }
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getProductImageUrlAttribute()
    {
        if ($this->attributes['image']) {
            return asset('storage/products/' . $this->attributes['image']);
        } else {
            return null;
        }
    }
}
