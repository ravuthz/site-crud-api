<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'parent_id' => Category::factory(),
            'depth' => $this->faker->numberBetween(0, 5),
            'slug' => $this->faker->slug,
            'title' => $this->faker->sentence(4),
            'excerpt' => $this->faker->text,
            'content' => $this->faker->paragraphs(3, true),
            'image' => $this->faker->word,
            'status' => $this->faker->word,
            'options' =>  [],
        ];
    }
}
