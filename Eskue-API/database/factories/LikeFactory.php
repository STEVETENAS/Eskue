<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::query()->pluck('Id');
        $posts = Post::query()->pluck('Id');
        return [
            'id' => $this->faker->unique()->uuid,
            'user_id' => $this->faker->randomElement($users),
            'post_id' => $this->faker->randomElement($posts),
        ];
    }
}
