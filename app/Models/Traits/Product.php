<?php

namespace App\Models\Traits;


use App\Models\Category;

trait Product
{
    public function getActionAttribute()
    {
        $editUrl = route('admin.products.edit', [$this->id]);

        return '<div class="edit-delete-action">
    <a class="me-2 p-2 mb-0 edit-btn" href="' . $editUrl . '">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-edit">
            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
        </svg>
    </a>

    <a class="p-2 mb-0 delete-btn" data-id="' . $this->id . '">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-trash-2">
            <polyline points="3 6 5 6 21 6"></polyline>
            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
            <line x1="10" y1="11" x2="10" y2="17"></line>
            <line x1="14" y1="11" x2="14" y2="17"></line>
        </svg>
    </a>

</div>';
    }

    public function getStatusAttribute()
    {
        if($this->attributes['status'] == 1){
            return '<span class="d-inline-flex align-items-center p-1 pe-2 rounded-1 text-white bg-success fs-10"><i class="ti ti-point-filled me-1 fs-11"></i>Active</span>';
        } else {
            return '<span class="d-inline-flex align-items-center p-1 pe-2 rounded-1 text-white bg-danger fs-10"><i class="ti ti-point-filled me-1 fs-11"></i>Inactive</span>';
        }
    }

    public function category()
    {
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
