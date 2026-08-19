<?php

namespace Database\Factories;

use App\Models\NewsPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<NewsPost>
 */
class NewsPostFactory extends Factory
{
    protected $model = NewsPost::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->sentence(6);

        return [
            'user_id' => User::factory(),
            'title' => $title,
            'slug' => Str::slug($title).'-'.fake()->unique()->numerify('#####'),
            'excerpt' => fake()->sentence(16),
            'content' => fake()->paragraphs(3, true),
            'featured_image' => null,
            'status' => NewsPost::STATUS_DRAFT,
            'published_at' => null,
            'tags' => null,
            'meta_title' => null,
            'meta_description' => null,
        ];
    }

    /**
     * Mark the post as a currently published article.
     */
    public function published(): static
    {
        return $this->state(fn (): array => [
            'status' => NewsPost::STATUS_PUBLISHED,
            'published_at' => now(),
        ]);
    }

    /**
     * Mark the post as a draft article.
     */
    public function draft(): static
    {
        return $this->state(fn (): array => [
            'status' => NewsPost::STATUS_DRAFT,
            'published_at' => null,
        ]);
    }
}
