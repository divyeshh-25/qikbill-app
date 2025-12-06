<?php

namespace App\Models\Traits;

use App\Models\User;

trait Tenant
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
