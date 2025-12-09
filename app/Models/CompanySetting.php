<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    protected $fillable = [
        'tenant_id',
        'name',
        'email',
        'address',
        'logo',
        'favicon',
        'show_logo_or_name'
    ];
}
