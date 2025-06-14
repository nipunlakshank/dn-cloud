<?php

namespace Database\Factories;

use App\Models\Chat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $chat = Chat::query()->inRandomOrder()->first();
        return [
            'text' => $this->faker->sentence(),
            'chat_id' => $chat->id,
            'user_id' => $chat->users()->inRandomOrder()->first()->id,
        ];
    }
}
