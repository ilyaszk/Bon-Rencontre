<?php

namespace Database\Seeders;

use App\Models\Categorie_produits;
use Illuminate\Database\Seeder;

class CategorieProduitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorie_produits::create(['nom' => 'Fromages']);
        Categorie_produits::create(['nom' => 'Viandes']);
        Categorie_produits::create(['nom' => 'Poissons']);
        Categorie_produits::create(['nom' => 'Légumes']);
        Categorie_produits::create(['nom' => 'Fruits']);
        Categorie_produits::create(['nom' => 'Epicerie']);
    }
}
