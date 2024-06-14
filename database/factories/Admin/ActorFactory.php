<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Actor>
 */
class ActorFactory extends Factory
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
            'name_ru' => $this->faker->name('m'),
            'surname_ru' => $this->faker->name('m'),
        ];
    }
}
