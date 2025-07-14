<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tenant::firstOrCreate(['name' => 'Acme Inc', 'slug' => 'acme']);
        Tenant::firstOrCreate(['name' => 'Globex Corp', 'slug' => 'globex']);
    }
}
