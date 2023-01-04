<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;

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
    public function definition()
    {
        return [
            'title'   => $this->faker->sentence,
            'excerpt' => '<p>'. implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            'body'    => '<p>'. implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
            'slug'    => $this->faker->slug,
            'category_id'   => Category::factory(),
            'user_id'       => User::factory(),
        ];
    }
}
