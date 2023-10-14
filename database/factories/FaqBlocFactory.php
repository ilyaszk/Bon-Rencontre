<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FaqBlocFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question' => $this->faker->word(),
            'reponse' => $this->faker->paragraph(),
            'faq_categorie_id' => rand(1, 6),
        ];
    }
}
