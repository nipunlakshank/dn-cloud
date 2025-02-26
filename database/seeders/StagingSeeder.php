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
            'first_name' => 'Dev',
            'last_name' => 'User',
            'email' => 'dev@gmail.com',
            'password' => Hash::make('Dev@123'),
            'remember_token' => Str::random(10),
            'role' => UserRoles::Admin->value,
            'email_verified_at' => now(),
        ]);

        User::create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@gmail.com',
            'password' => Hash::make('Test@123'),
            'remember_token' => Str::random(10),
            'role' => UserRoles::Admin->value,
            'email_verified_at' => now(),
        ]);

        User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin@123'),
            'remember_token' => Str::random(10),
            'role' => UserRoles::SuperAdmin->value,
            'email_verified_at' => now(),
        ]);

        // Dev Users
        User::create([
            'first_name' => 'Nipun',
            'last_name' => 'Lakshan',
            'email' => 'nipun@gmail.com',
            'password' => Hash::make('Nipun@123'),
            'remember_token' => Str::random(10),
            'role' => UserRoles::Developer->value,
            'email_verified_at' => now(),
        ]);

        User::create([
            'first_name' => 'Brayan',
            'last_name' => 'Dewitt',
            'email' => 'brayan@gmail.com',
            'password' => Hash::make('Brayan@123'),
            'remember_token' => Str::random(10),
            'role' => UserRoles::Developer->value,
            'email_verified_at' => now(),
        ]);

        User::create([
            'first_name' => 'Madhuka',
            'last_name' => 'Kumarage',
            'email' => 'madhuka@gmail.com',
            'password' => Hash::make('Madhuka@123'),
            'remember_token' => Str::random(10),
            'role' => UserRoles::Developer->value,
            'email_verified_at' => now(),
        ]);
    }
}
