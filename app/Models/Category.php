<?php

namespace App\Models;

use App\Models\Traits\Category as TraitsCategory;
use App\Models\Traits\Reusable;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use TraitsCategory;
    use BelongsToTenant,Reusable;

    protected $fillable = ['tenant_id','name','slug','status','description','parent_id'];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    protected static function booted()
    {
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
        static::updating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }
}
