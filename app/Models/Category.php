<?php

namespace App\Models;

use App\Models\Traits\Category as TraitsCategory;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use TraitsCategory;
    use BelongsToTenant;

    protected $fillable = ['tenant_id','name','slug','status','description','parent_id'];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    protected static function booted()
    {
        static::creating(function ($item) {
            if (empty($item->slug)) {
                $item->slug = Str::slug($item->name);
            }
        });
        static::updating(function ($item) {
            $item->slug = Str::slug($item->name);
        });
    }
}
