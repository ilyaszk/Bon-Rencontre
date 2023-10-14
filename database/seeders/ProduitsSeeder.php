<?php

namespace Database\Seeders;

use App\Models\Produits;
use Carbon\Factory;
use Illuminate\Database\Seeder;

class ProduitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produits::factory()->times(50)->create();
    }
}
