<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title_uk' => $this->faker->title(10),
            'title_ru' => $this->faker->title(10),
            'year' => random_int(1950, 2024),
            'poster' => $this->faker->url(),
            'trailer' => $this->faker->url(),
        ];
    }
}