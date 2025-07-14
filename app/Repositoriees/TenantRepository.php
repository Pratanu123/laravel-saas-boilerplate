<?php
namespace App\Repositories;

use App\Models\Tenant;

class TenantRepository
{
    public function getDefaultTenant(): Tenant
    {
        return Tenant::first();
    }
}
