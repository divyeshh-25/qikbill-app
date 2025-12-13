<?php

namespace App\Models;

use App\Models\Traits\Reusable;
use App\Models\Traits\Role as TraitsRole;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use Reusable, TraitsRole;
    protected $fillable = [
        'name', 
        'guard_name',
        'status',
        'tenant_id'
    ];

    public function hasUsers()
    {
        return $this->users()->count() > 0;
    }
}
