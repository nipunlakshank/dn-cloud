<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
