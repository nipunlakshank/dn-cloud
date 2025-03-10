<?php

namespace Database\Seeders;

use App\Enums\App\UserRoles;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StagingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'super@gmail.com',
            'password' => Hash::make('Super@123'),
            'remember_token' => Str::random(10),
            'role' => UserRoles::SuperAdmin->value,
            'email_verified_at' => now(),
        ]);

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin@123'),
            'remember_token' => Str::random(10),
            'role' => UserRoles::Admin->value,
            'email_verified_at' => now(),
        ]);

        User::create([
            'first_name' => 'Accountant',
            'last_name' => 'User',
            'email' => 'accountant@gmail.com',
            'password' => Hash::make('Accountant@123'),
            'remember_token' => Str::random(10),
            'role' => UserRoles::Accountant->value,
            'email_verified_at' => now(),
        ]);

        User::create([
            'first_name' => 'Worker',
            'last_name' => 'User',
            'email' => 'worker@gmail.com',
            'password' => Hash::make('Worker@123'),
            'remember_token' => Str::random(10),
            'role' => UserRoles::Worker->value,
            'email_verified_at' => now(),
        ]);

        User::create([
            'first_name' => 'Dev',
            'last_name' => 'User',
            'email' => 'dev@gmail.com',
            'password' => Hash::make('Dev@123'),
            'remember_token' => Str::random(10),
            'role' => UserRoles::Developer->value,
            'email_verified_at' => now(),
        ]);
    }
}
