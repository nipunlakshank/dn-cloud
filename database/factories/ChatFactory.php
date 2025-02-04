<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chat>
 */
class ChatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();

        return [
            'name' => $name,
            'avatar' => fake()->randomElement(['https://picsum.photos/seed/avatar' . fake()->randomNumber() . '/200', null]),
            'is_group' => fake()->randomElement([true, false]),
        ];
    }
}
