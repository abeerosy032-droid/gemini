<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(6);
        $status = $this->faker->randomElement(['draft', 'published']);

        return [
            'title'          => $title,
            'slug'           => \Str::slug($title),
            'body'           => $this->faker->paragraphs(5, true),
            'status'         => $status,
            'published_at'   => $status === 'published' ? $this->faker->dateTimeBetween('-1 year', 'now') : null,
            'featured_image' => $this->faker->boolean(70) ? 'posts/' . $this->faker->uuid . '.jpg' : null,
        ];
    }
}
