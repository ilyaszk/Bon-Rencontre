<?php

namespace Database\Seeders;

use App\Models\Reductions;
use Illuminate\Database\Seeder;

class ReductionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reductions::factory()->times(50)->create();
    }
}
