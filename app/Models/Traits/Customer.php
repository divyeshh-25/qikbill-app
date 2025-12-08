<?php

namespace App\Models\Traits;


trait Customer
{

    public function getActionAttribute()
    {
        $editUrl =route('admin.customers.edit', [$this->id, 'type=subcategory']);
        $deleteUrl = route('admin.customers.destroy', $this->id);

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


}
