<?php

namespace Database\Factories;

use App\Models\Produits;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReductionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $produits = Produits::all();
        return [
            'nom' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'pourcent' => $this->faker->randomElement([5, 10, 15, 20, 25]),
            'actif' => $this->faker->boolean(),
            'produits_id' => $this->faker->unique(true)->numberBetween(1, $produits->count())
        ];
    }
}
