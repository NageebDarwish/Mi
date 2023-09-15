<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class homePageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'landing_title_en' => $this->faker->sentence(),
            'landing_title_ar' => $this->faker->sentence(),
            'landing_desc_en' => $this->faker->sentence(),
            'landing_desc_ar' => $this->faker->sentence(),
            'landing_image' => $this->faker->imageUrl(640, 480),
            'about_image' => $this->faker->imageUrl(640, 480),
            'about_title_en' => $this->faker->sentence(),
            'about_title_ar' => $this->faker->sentence(),
            'about_desc_en' => $this->faker->sentence(),
            'about_desc_ar' => $this->faker->sentence(),
        ];
    }
}
