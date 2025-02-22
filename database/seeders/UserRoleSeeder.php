<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Seeding user roles.
     */
    public function run(): void
    {
        Role::create(['name' => 'dev'])->givePermissionTo(['user-management', 'user-register', 'user-deactivate', 'user-promote', 'user-demote', 'group-management', 'user-group', 'user-group-create', 'user-group-delete', 'user-group-add', 'user-group-remove', 'visit-management', 'visit-chat', 'visit-dashboard', 'visit-report', 'user-login', 'admin-management', 'admin-add', 'admin-remove']);
        Role::create(['name' => 'super-admin'])->givePermissionTo(['user-management', 'user-register', 'user-deactivate', 'user-promote', 'user-demote', 'group-management', 'user-group', 'user-group-create', 'user-group-delete', 'user-group-add', 'user-group-remove', 'visit-management', 'visit-chat', 'visit-dashboard', 'visit-report', 'user-login', 'admin-management', 'admin-add', 'admin-remove']);
        Role::create(['name' => 'admin'])->givePermissionTo(['user-management', 'user-register', 'user-deactivate', 'user-promote', 'user-demote', 'group-management', 'user-group', 'user-group-create', 'user-group-delete', 'user-group-add', 'user-group-remove', 'visit-management', 'visit-chat', 'visit-dashboard', 'visit-report', 'user-login']);
        Role::create(['name' => 'accountant'])->givePermissionTo(['group-management', 'user-group', 'user-group-create', 'user-group-delete', 'user-group-add', 'user-group-remove', 'visit-management', 'visit-chat', 'visit-dashboard', 'visit-report', 'user-login']);
        Role::create(['name' => 'worker'])->givePermissionTo(['visit-management', 'visit-chat', 'visit-dashboard', 'user-login']);
    }
}
