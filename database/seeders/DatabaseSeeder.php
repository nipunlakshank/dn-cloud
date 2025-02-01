<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Dev',
            'last_name' => 'User',
            'email' => 'dev@gmail.com',
            'password' => Hash::make('Dev@123'),
            'remember_token' => Str::random(10),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::factory(5)->create();

        Chat::factory(5)->create([
            'is_group' => true,
        ]);
        Chat::factory(5)->create([
            'name' => null,
            'is_group' => false,
        ]);

        $users = User::all();
        $chats = Chat::all();

        $chats->each(function ($chat) use ($users) {
            if ($chat->is_group) {
                $chat->users()->attach($users->random()->id, ['is_admin' => true]);
                ChatUser::factory(5)->create([
                    'chat_id' => $chat->id,
                    'user_id' => $users->random()->id,
                ]);
            } else {
                $chat->users()->attach($users->random()->id);
                $chat->users()->attach($users->random()->id);
            }
        });

        $chats->each(function ($chat) {
            for ($i = 0; $i < 10; $i++) {
                Message::factory()->create([
                    'chat_id' => $chat->id,
                    'user_id' => $chat->users()->inRandomOrder()->first()->id,
                    'replied_to' => $i % 2 === 0 ? null : Message::query()
                        ->where('chat_id', $chat->id)
                        ->inRandomOrder()->first()->id,
                ]);
            }
        });
    }
}
