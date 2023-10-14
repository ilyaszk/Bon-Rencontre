<?php

namespace Database\Seeders;

use App\Models\Visiteurs;
use Illuminate\Database\Seeder;

class AbonnesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Visiteurs::create([
            'email' => 'julienrw@gmail.com',
        ]);
    }
}
