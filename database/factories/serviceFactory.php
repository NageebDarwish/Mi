<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class serviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'best' => $this->faker->numberBetween(0, 1),
            'icon' => $this->faker->imageUrl(640, 480),
        ];
    }
}
