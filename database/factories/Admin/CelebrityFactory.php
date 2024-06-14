<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Celebrity>
 */
class CelebrityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_uk' => $this->faker->name('m'),
            'surname_uk' => $this->faker->name('m'),
            'gender_uk' => $this->faker->name(),
            'description_uk' => $this->faker->text(),
            'name_ru' => $this->faker->name('m'),
            'surname_ru' => $this->faker->name('m'),
            'gender_ru' => $this->faker->name(),
            'description_ru' => $this->faker->text(),

            'day' => random_int(1, 31),
            'month' => random_int(1, 12),
            'year' => $this->faker->year(),
            'published' => true,
            // 'published' => $this->faker->boolean(),
        ];
    }
}
