<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tenant;
class TenatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tenant::create([
            'name' => 'Example Tenant',
            'domain' => 'example.test',
            'owner_name' => 'John Doe',
            'owner_email' => 'john@example.com',
            'status' => 1,
            'meta' => json_encode([
                'plan' => 'basic',
                'storage' => '1GB'
            ]),
        ]);
    }
}
