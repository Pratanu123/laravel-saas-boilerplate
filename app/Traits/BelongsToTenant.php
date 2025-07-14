<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait BelongsToTenant
{
    protected static function bootBelongsToTenant()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            if ($user = Auth::user()) {
                $builder->where('tenant_id', $user->tenant_id);
            }
        });
    }
}
