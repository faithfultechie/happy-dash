<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['name' => 'Superuser', 'description' => 'Elevated privileges, sensitive data access', 'guard_name' => 'web'],
            ['name' => 'Manager', 'description' => 'Department oversight, task coordination', 'guard_name' => 'web'],
            ['name' => 'Editor', 'description' => 'Content creation, editing, curation', 'guard_name' => 'web'],
            ['name' => 'User', 'description' => 'Regular interaction, limited privileges', 'guard_name' => 'web'],
        ]);
    }
}
