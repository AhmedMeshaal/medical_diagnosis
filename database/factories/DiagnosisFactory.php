<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Diagnosis>
 */
class DiagnosisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'injure' => $this->faker->name(),
            'description' => $this->faker->text(),
            'symptoms' => $this->faker->text(),
            'sign' => $this->faker->text(),
        ];
    }
}
