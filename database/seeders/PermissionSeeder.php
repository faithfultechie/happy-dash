<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([
            ['name' => 'create-contract', 'description' => 'Create contract', 'guard_name' => 'web'],
            ['name' => 'edit-contract', 'description' => 'Edit contract', 'guard_name' => 'web'],
            ['name' => 'view-contract', 'description' => 'View contract', 'guard_name' => 'web'],
            ['name' => 'delete-contract', 'description' => 'Delete contract', 'guard_name' => 'web'],
            ['name' => 'create-company', 'description' => 'Create company', 'guard_name' => 'web'],
            ['name' => 'edit-company', 'description' => 'Edit company', 'guard_name' => 'web'],
            ['name' => 'view-company', 'description' => 'View company', 'guard_name' => 'web'],
            ['name' => 'delete-company', 'description' => 'Delete company', 'guard_name' => 'web'],
            ['name' => 'create-admin', 'description' => 'Manage users', 'guard_name' => 'web'],
            ['name' => 'edit-admin', 'description' => 'Edit users', 'guard_name' => 'web'],
            ['name' => 'superuser', 'description' => 'Superuser', 'guard_name' => 'web'],
        ]);
    }
}
