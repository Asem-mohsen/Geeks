<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class TagFactory extends Factory
{

    public function definition(): array
    {
        $tags = ['entertainment', 'funny', 'technology', 'health', 'sports', 'travel', 'food', 'lifestyle'];

        return [
            'tag' => $this->faker->unique()->randomElement($tags),
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
