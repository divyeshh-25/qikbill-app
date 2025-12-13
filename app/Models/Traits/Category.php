<?php

namespace App\Models\Traits;

use App\Models\Category as CategoryModel;
trait Category
{
    public function getStatusBadgeAttribute()
    {
        if ($this->status == "published") {
            return '<span class="badge bg-success fw-medium fs-10">Published</span>';
        } else {
            return '<span class="badge bg-danger fw-medium fs-10">Draft</span>';
        }
    }


    public function setStatusAttribute($value)
    {
        if($value === true || $value === 'on' || $value == 1){
            $this->attributes['status'] = 1;
        }else{
            $this->attributes['status'] = 0;
        }
    }

    public function parent(){
            return $this->belongsTo(CategoryModel::class);
    }
}
