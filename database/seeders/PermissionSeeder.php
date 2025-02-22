<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** Handle "Admin Management" permissions */
        Permission::create(['name' => 'admin-management']);
        Permission::create(['name' => 'admin-add']);
        Permission::create(['name' => 'admin-remove']);

        /** Handle "User Management" permissions */
        Permission::create(['name' => 'user-management']);

        Permission::create(['name' => 'user-register']);
        Permission::create(['name' => 'user-deactivate']);
        Permission::create(['name' => 'user-promote']);
        Permission::create(['name' => 'user-demote']);

        /** Handle "Group Management" permissions */
        Permission::create(['name' => 'group-management']);

        Permission::create(['name' => 'user-group']);
        Permission::create(['name' => 'user-group-create']);
        Permission::create(['name' => 'user-group-delete']);
        Permission::create(['name' => 'user-group-add']);
        Permission::create(['name' => 'user-group-remove']);

        /** Handle "Routing" permissions */
        Permission::create(['name' => 'visit-management']);

        Permission::create(['name' => 'visit-chat']);
        Permission::create(['name' => 'visit-dashboard']);
        Permission::create(['name' => 'visit-report']);

        /** Handle "Login" permissions */
        Permission::create(['name' => 'user-login']);
    }
}
