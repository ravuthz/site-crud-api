<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'category_id' => Category::factory(),
            // 'type_id' => Setting::factory(),
            'slug' => $this->faker->slug,
            'title' => $this->faker->sentence(4),
            'excerpt' => $this->faker->text,
            'content' => $this->faker->paragraphs(3, true),
            'image' => $this->faker->word,
            'status' => $this->faker->word,
            'options' => [],
        ];
    }
}
