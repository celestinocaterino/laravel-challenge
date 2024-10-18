<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected $model = \App\Models\Event::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'scheduled_at' => fake()->dateTimeBetween('+1 days', '+2 years'),
            'location' => fake()->sentence(),
            'max_attendees' => fake()->numberBetween(0, 100)
        ];
    }
}
