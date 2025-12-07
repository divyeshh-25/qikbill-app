<?php

namespace App\Models\Traits;

use App\Models\Tenant;

trait User
{
    public function tenants()
    {
        return $this->belongsTo(Tenant::class);
    }
}
