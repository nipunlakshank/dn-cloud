<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

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
            'email_verified_at' => now(),
        ])->assignRole('dev');

        User::create([
            'first_name' => 'Super Admin',
            'last_name' => 'User',
            'email' => 'super@gmail.com',
            'password' => Hash::make('Super@123'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ])->assignRole('super-admin');

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin@123'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ])->assignRole('admin');

        User::create([
            'first_name' => 'Accountant',
            'last_name' => 'User',
            'email' => 'accountant@gmail.com',
            'password' => Hash::make('Accountant@123'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ])->assignRole('accountant');

        User::create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@gmail.com',
            'password' => Hash::make('Test@123'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ])->assignRole('worker');

        User::factory(3)->create()->map(function ($user) {
            $user->assignRole('worker');
        });
    }
}
