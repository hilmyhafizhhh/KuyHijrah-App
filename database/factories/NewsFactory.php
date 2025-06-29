<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::inRandomOrder()->value('id'),
            'source_id' => User::inRandomOrder()->value('id'),
            'title' => fake()->sentence(mt_rand(2, 8)),
            'slug' => fake()->unique()->slug(),
            'excerpt' => fake()->paragraph(),
            'body' => collect(fake()->paragraphs(mt_rand(5, 10)))
            ->map(fn($p) => "<p>$p</p>")
            ->implode(''),
        ];
    }
}
