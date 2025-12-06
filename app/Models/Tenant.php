<?php

namespace App\Models;

use App\Models\Traits\Tenant as TraitsTenant;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use TraitsTenant;

    public $fillable = [
        'name',
        'domain',
        'owner_name',
        'owner_email',
        'status',
        'meta'
    ];
}
