<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chats = Chat::all();

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
