<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'alt' => $this->faker->word(),
            'file_path' => $this->faker->image('public/frontend/img/produits_img', 1600, 1200),
            'produits_id' => rand(1, 50)
        ];
    }
}
