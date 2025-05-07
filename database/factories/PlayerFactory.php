<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'spl_id' => $this->faker->uuid(),
            'name' => $this->faker->name(),
            'age_bracket' => $this->faker->numberBetween(16,40),
            'DOB' => $this->faker->date(),
        ];
    }
}
