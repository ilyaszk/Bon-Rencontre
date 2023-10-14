<?php

namespace Database\Seeders;

use App\Models\FaqCategorie;
use Illuminate\Database\Seeder;

class FaqCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FaqCategorie::create(['nom' => 'Ma commande']);
        FaqCategorie::create(['nom' => 'Paiement']);
        FaqCategorie::create(['nom' => 'Retrait et suivi de commande']);
        FaqCategorie::create(['nom' => 'Mon compte']);
        FaqCategorie::create(['nom' => 'Ma newsletter']);
    }
}
