<?php

namespace Database\Seeders;

use App\Models\Marche;
use Illuminate\Database\Seeder;

class MarcheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marche::create([
            'file_path' => 'public/frontend/img/placeholders/marche-la-rochelle-tourisme-agence-les-conteurs-38.jpg',
            'titre1' => 'Marché hebdomadaire',
            'titre2' => 'Marché mensuel',
            'titre3' => 'Marché de noël',

            'para1' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis totam vitae quae soluta blanditiis, ab expedita non quibusdam modi aliquid magnam quisquam velit consectetur hic nulla odit ipsam illum amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi optio delectus dolorem, eligendi harum provident nostrum accusamus, natus possimus asperiores consequuntur et similique doloremque adipisci ad odit praesentium molestiae architecto?',
            'para2' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis totam vitae quae soluta blanditiis, ab expedita non quibusdam modi aliquid magnam quisquam velit consectetur hic nulla odit ipsam illum amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi optio delectus dolorem, eligendi harum provident nostrum accusamus, natus possimus asperiores consequuntur et similique doloremque adipisci ad odit praesentium molestiae architecto?',
            'para3' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis totam vitae quae soluta blanditiis, ab expedita non quibusdam modi aliquid magnam quisquam velit consectetur hic nulla odit ipsam illum amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi optio delectus dolorem, eligendi harum provident nostrum accusamus, natus possimus asperiores consequuntur et similique doloremque adipisci ad odit praesentium molestiae architecto?',

            'date1' => "Lundi 08h30 - 12h00| 
                        mardi 08h30 - 12h00|
                        vendredi 08h30 - 12h00",
            'date2' => '1er vendredi du mois 08h30 - 12h00',
            'date3' => '24 décembre 08h00 - 19h00'
        ]);
    }
}
