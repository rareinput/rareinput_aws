<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
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
            'title' => fake()->sentence(6),
            'slug' => fake()->unique()->slug(),
            'excerpt' => fake()->paragraph(2),
            'body' => implode("\n\n", fake()->paragraphs(5)),
            'featured_image' => null,
            'published_at' => fake()->optional(0.8)->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
