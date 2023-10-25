<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attachment>
 */
class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->slug,
            'name' => $this->faker->slug,
            'size' => $this->faker->numberBetween(0, 10),
            'mime' => $this->faker->slug,
            'path' => $this->faker->text,
            'original_name' => $this->faker->word,
        ];
    }
}
