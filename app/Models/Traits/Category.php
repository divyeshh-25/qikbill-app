<?php

namespace App\Models\Traits;


use App\Models\Category as CategoryModel;

trait Category
{

    public function getActionAttribute()
    {
        $editUrl =route('admin.categories.edit', [$this->id, 'type=subcategory']);
        $deleteUrl = route('admin.categories.destroy', $this->id);

        return '<div class="edit-delete-action">
            <a class="me-2 p-2"  data-url="' . $editUrl . '"
                        data-type="add"
                        data-title="Add Category"
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
        if ($this->status == "published") {
            return '<span class="badge bg-success fw-medium fs-10">Published</span>';
        } else {
            return '<span class="badge bg-danger fw-medium fs-10">Draft</span>';
        }
    }

    public function parent(){
            return $this->belongsTo(CategoryModel::class);
    }
}
