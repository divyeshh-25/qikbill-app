<?php

namespace App\Models\Traits;

trait Role
{
    public function setStatusAttribute($value)
    {
        if ($value === true || $value === 'on' || $value == 1) {
            $this->attributes['status'] = 1;
        } else {
            $this->attributes['status'] = 0;
        }
    }
}
