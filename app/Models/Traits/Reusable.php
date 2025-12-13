<?php

namespace App\Models\Traits;

trait Reusable
{
    public function actions($view = true, $edit = true, $delete = true, $permission = false)
    {
        return view('components.layout.actions', [
            'id'     => $this->id,
            'view'   => $view,
            'edit'   => $edit,
            'delete' => $delete,
            'permission' => $permission
        ])->render();
    }

    public function getStatusAttribute()
    {
        if($this->attributes['status'] == 1){
            return '<span class="d-inline-flex align-items-center p-1 pe-2 rounded-1 text-white bg-success fs-10"><i class="ti ti-point-filled me-1 fs-11"></i>Active</span>';
        } else {
            return '<span class="d-inline-flex align-items-center p-1 pe-2 rounded-1 text-white bg-danger fs-10"><i class="ti ti-point-filled me-1 fs-11"></i>Inactive</span>';
        }
    }
}
