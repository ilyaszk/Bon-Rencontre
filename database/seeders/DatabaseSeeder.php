<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(CategorieProduitsSeeder::class);
        $this->call(InfosCommercialesSeeder::class);
        $this->call(ProduitsSeeder::class);
        $this->call(ReductionsSeeder::class);
        $this->call(FaqCategorieSeeder::class);
        $this->call(FaqBlocSeeder::class);
        $this->call(ImagesSeeder::class);
        $this->call(TypeCommerceSeeder::class);
        $this->call(AbonnesSeeder::class);
        $this->call(QuiSommeNousSeeder::class);
        $this->call(MarcheSeeder::class);
        $this->call(AccueilSeeder::class);
    }
}
