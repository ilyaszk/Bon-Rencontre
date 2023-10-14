<?php

namespace Database\Seeders;

use App\Models\TypeCommerce;
use Illuminate\Database\Seeder;

class TypeCommerceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeCommerce::create(['type_commerce' => 'Aucun']);
        TypeCommerce::create(['type_commerce' => 'Epicerie']);
        TypeCommerce::create(['type_commerce' => 'Maraicher']);
        TypeCommerce::create(['type_commerce' => 'Eleveur']);
        TypeCommerce::create(['type_commerce' => 'Fromager']);
        TypeCommerce::create(['type_commerce' => 'Traiteur']);
        TypeCommerce::create(['type_commerce' => 'Bijouterie']);
    }
}
