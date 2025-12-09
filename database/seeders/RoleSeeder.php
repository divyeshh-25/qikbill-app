<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
            'status' => 1,
            'tenant_id' => 1
        ]);

        Role::create([
            'name' => 'manager',
            'status' => 1,
            'tenant_id' => 1
        ]);

        Role::create([
            'name' => 'staff',
            'status' => 1,
            'tenant_id' => 1
        ]);

        Role::create([
            'name' => 'customer',
            'status' => 1,
            'tenant_id' => 1
        ]);
    }
}
