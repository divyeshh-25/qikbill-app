<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'product' => [
                'view',
                'create',
                'edit',
                'delete'
            ],
            'category' => [
                'view',
                'create',
                'edit',
                'delete'
            ],
            'user' => [
                'view',
                'create',
                'edit',
                'delete'
            ],
            'role' => [
                'view',
                'create',
                'edit',
                'delete',
                'permission'
            ],
            'setting' => [
                'manage',
            ],
            'pos' => [
                'manage'
            ]
        ];

        DB::transaction(function () use ($permissions) {
            foreach ($permissions as $module => $actions) {
                foreach ($actions as $action) {
                    $name = "{$module}.{$action}";
                    Permission::firstOrCreate(
                        ['name' => $name],
                        ['module' => $module, 'guard_name' => 'web']
                    );
                }
            }

            $admin = Role::findByName('admin');
            if ($admin) {
                $admin->syncPermissions(Permission::all());
            }
        });
    }
}
