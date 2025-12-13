<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait BelongsToTenant
{
    public static function bootBelongsToTenant()
    {
        static::creating(function ($model) {
            if (!empty($model->tenant_id)) {
                return;
            }
            if (Auth::check() && Auth::user()->tenant_id) {
                $model->tenant_id = Auth::user()->tenant_id;
            }
            else {
                $model->tenant_id = 1;
            }
        });

        static::addGlobalScope('tenant', function (Builder $builder) {
            if (Auth::check() && Auth::user()->tenant_id) {
                $tenantId = Auth::user()->tenant_id;
            }
            else {
                $tenantId = 1;
            }
            $builder->where('tenant_id', $tenantId);
        });
    }

    public function scopeForTenant($query)
    {
        $tenantId = Auth::check() ? (Auth::user()->tenant_id ?? 1) : 1;
        return $query->where('tenant_id', $tenantId);
    }
}
