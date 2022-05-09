<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::query()->pluck('Id');
        $services = Service::query()->pluck('Id');
        return [
            'id' => $this->faker->unique()->uuid,
            'user_id' => $this->faker->randomElement($users),
            'service_id' => $this->faker->randomElement($services),
            'title' => $this->faker->sentence,
            'description' => $this->faker->realText
        ];
    }
}
