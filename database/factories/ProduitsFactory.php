<?php

namespace Database\Factories;

use App\Models\Reductions;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->word(),
            'reference' => $this->faker->isbn13(),
            'desc_produit' => $this->faker->paragraph(),
            'prix' => $this->faker->randomFloat(2, 5, 30),
            'en_stock' => $this->faker->boolean(),
            'en_vedette' => $this->faker->boolean(),
            'categories_id' => rand(1, 6),
            'infocom_id' => rand(1, 5),
        ];
    }
}
