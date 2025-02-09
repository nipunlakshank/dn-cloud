<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@gmail.com',
            'password' => Hash::make('Test@123'),
            'remember_token' => Str::random(10),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::factory(5)->create();

        Chat::factory(5)->create([
            'is_group' => true,
        ]);
        Chat::factory(5)->create([
            'is_group' => false,
        ]);

        $users = User::all();
        $chats = Chat::all();

        $chats->each(function ($chat) use ($users) {
            if ($chat->is_group) {
                $chat->users()->attach($users->random()->id, ['role' => 'owner']);
                for ($i = 0; $i < 5; $i++) {
                    $userId = $users->random()->id;

                    while ($chat->users()->where('user_id', $userId)->exists()) {
                        $userId = $users->random()->id;
                    }

                    ChatUser::factory()->create([
                        'chat_id' => $chat->id,
                        'user_id' => $userId,
                    ]);
                }
            } else {
                $firstUser = $users->random();
                $secondUser = $users->random();
                while ($secondUser->id === $firstUser->id) {
                    $secondUser = $users->random();
                }
                $chat->users()->attach([$firstUser->id, $secondUser->id]);
            }
        });

        $chats->each(function ($chat) {
            $messages = Collection::empty();

            for ($i = 0; $i < 100; $i++) {
                $user = $chat->users()->inRandomOrder()->first();

                $message = Message::factory()->create([
                    'chat_id' => $chat->id,
                    'user_id' => $user->id,
                    'replied_to' => $i % 2 === 0 ? null : Message::query()
                        ->where('chat_id', $chat->id)
                        ->inRandomOrder()->first()->id,
                ]);

                $messages->push($message);
            }

            $messages->each(function ($message) {
                $receivers = $message->receivers;
                $receivers->each(function ($receiver) use ($message) {
                    $message->status()->where('user_id', $receiver->id)->update([
                        'delivered_at' => now(),
                        'read_at' => now(),
                    ]);
                });
            });
        });
    }
}
