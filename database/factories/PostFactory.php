<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
        return [
            //
            'category_id' => str(rand(6, 16)),
            'user_id' => str(rand(13, 22)),
            'title' => fake()->text(50),
            'content' => fake()->text(),
            'sumary' => fake()->text(100),
            'img_thumb' => fake()->imageUrl(),
            'author' => fake()->name()
        ];
    }
}
