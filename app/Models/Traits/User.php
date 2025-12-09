<?php

namespace App\Models\Traits;

use App\Models\Tenant;

trait User
{
    public function tenants()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function setStatusAttribute($value)
    {
        if($value === true || $value === 'on' || $value == 1){
            $this->attributes['status'] = 1;
        }else{
            $this->attributes['status'] = 0;
        }
    }

    public function getProfileImageUrlAttribute()
    {
        if ($this->attributes['image']) {
            return asset('storage/users/' . $this->attributes['image']);
        } else {
            return null;
        }
    }
}
