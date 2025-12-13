<?php

namespace App\Models;

use App\Models\Traits\Customer as TraitsCustomer;
use App\Models\Traits\Reusable;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use BelongsToTenant;
    use TraitsCustomer,Reusable;
    protected $guarded = [];
}
