<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
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
        $users = User::query()->pluck('Id');
        return [
            'id' => $this->faker->unique()->uuid,
            'sender_id' => $this->faker->randomElement($users),
            'receiver_id' => $this->faker->randomElement($users),
            'text' => $this->faker->sentence
        ];
    }
}
