<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;

class PostFactory extends Factory
{
    protected $model = Post::class;
    public function definition(): array
    {
        return [
            'body' => $this->faker->paragraphs(3, true),
            'user_id' => User::inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement(['draft', 'published']),
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
