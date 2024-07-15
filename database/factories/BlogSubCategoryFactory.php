<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogSubCategory>
 */
class BlogSubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'description' => fake()->paragraph(),
            'image' => fake()->image('public/uploads/blogs/subcategory',640,480, null, false),
            'status' => fake()->randomElement(['active','inactive']),
            'svg' => fake()->randomElement(['<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check-fill" viewBox="0 0 16 16"><path d="M13.854 1.146a.5.5 0 0 1 0 .708L6.5 9.914 4.354 7.768a.5.5 0 1 1 .708-.708l2.5 2.5a.5.5 0 0 1 .708 0l6.5-6.5z"/><path d="M5.5 9.914l-2.146 2.146a.5.5 0 0 1-.708-.708l2.5-2.5a.5.5 0 0 1 .708 0l6.5 6.5a.5.5 0 0 1-.708.708L5.5 9.914z"/></svg>','<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M13.854 1.146a.5.5 0 0 1 0 .708L6.5 9.914 4.354 7.768a.5.5 0 1 1 .708-.708l2.5 2.5a.5.5 0 0 1 .708 0l6.5-6.5a.5.5 0 0 1-.708.708L6.5 9.914l7.354-7.354z"/></svg>']),
            'icon' => fake()->randomElement(['<i class="fas fa-bookmark"></i>','<i class="fas fa-bookmark"></i>']),
            'meta_title' => fake()->sentence(),
            'meta_description' => fake()->paragraph(),
            'meta_keywords' => fake()->sentence(),
            'blog_category_id' => fake()->numberBetween(1,10),
        ];
    }
}
