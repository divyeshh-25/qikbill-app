<?php

namespace App\Models;

use App\Models\Traits\Customer as TraitsCustomer;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use BelongsToTenant;
    use TraitsCustomer;
    protected $guarded = [];
}
