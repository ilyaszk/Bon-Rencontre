<?php

namespace Database\Seeders;

use App\Models\Accueil;
use Illuminate\Database\Seeder;

class AccueilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accueil::create([
            'description' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores maxime voluptatibus similique. Amet consequatur doloremque ut quae in animi quaerat, voluptate similique veniam pariatur adipisci accusamus beatae fugiat laboriosam vero!",
            'file_path' => 'frontend/img/banniere.jpg',
        ]);
    }
}
