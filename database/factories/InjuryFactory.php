<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InjuryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_event' => $this->faker->date(),
            'problem_type' => $this->faker->word(),
            'onset' => $this->faker->text(),
            'when_occurred' => $this->faker->word(),
            'fixture_minute' => $this->faker->numberBetween(1, 90),
            'contact' => $this->faker->phoneNumber(),
            'contact_type' => $this->faker->word(),
            'subsequent_cat' => $this->faker->word(),
            'time_loss' => $this->faker->time('H:i:s', '+90 minutes'),
        ];
    }
}
