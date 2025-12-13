<?php

namespace App\Models;

use App\Models\Traits\Product as TraitsProduct;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use TraitsProduct;
    use BelongsToTenant;

    protected $fillable = [
        'tenant_id',
        'sku',
        'name',
        'description',
        'category_id',
        'price',
        'cost_price',
        'stock_quantity',
        'status',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}

