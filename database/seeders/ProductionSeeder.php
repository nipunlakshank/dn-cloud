<?php

namespace Database\Seeders;

use App\Enums\App\UserRoles;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'sachs0895@gmail.com',
            'role' => UserRoles::SuperAdmin->value,
        ]);
    }
}
