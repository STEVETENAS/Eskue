<?php

namespace Database\Factories;

use App\Models\ServiceType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ServiceType::pluck('Id');
        return [
            'id' => $this->faker->unique()->uuid,
            'type_id' => $this->faker->randomElement($types),
            'title' => $this->faker->sentence,
        ];
    }
}
