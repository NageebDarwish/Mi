<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class galleryImagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'gallery_id' => $this->faker->numberBetween(133, 147),
            'image' => $this->faker->imageUrl(640, 480),
        ];
    }
}
