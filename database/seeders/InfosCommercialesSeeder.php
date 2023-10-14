<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InfosCommerciales;
use Illuminate\Support\Facades\Hash;

class InfosCommercialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InfosCommerciales::truncate();
        $infos = [
            [
                'nom_entreprise' => 'La ruée vers l\'or',
                'siret' => 55140001571301,
                'numeroRue' => '14',
                'rue' => 'chemin de combre noire',
                'ville' => 'Notre-dame de l\'osier',
                'region' => 'Isère',
                'latitude' => 45.23685876217245,
                'longitude' => 5.408805203270137,
                'email_commercial' => 'rvo@gmail.com',
                'telephone' => '0654875214',
                'type_commerce' => 'Epicerie',
                'en_vedette' => false,
                'user_id' => 3,
            ],
            [
                'nom_entreprise' => 'Optimum traiteur',
                'siret' => 57000305141511,
                'numeroRue' => '26',
                'rue' => 'route de l\'arène',
                'ville' => 'Notre-dame de l\'osier',
                'region' => 'Isère',
                'latitude' => 45.23727235729266,
                'longitude' => 5.411478644790629,
                'email_commercial' => 'optimum.traiteur@gmail.com',
                'telephone' => '0687548632',
                'type_commerce' => 'Traiteur',
                'en_vedette' => false,
                'user_id' => 4,
            ],
            [
                'nom_entreprise' => 'Ligne verte',
                'siret' => 05141570001531,
                'numeroRue' => '2',
                'rue' => 'rue des oblats',
                'ville' => 'Notre-dame de l\'osier',
                'region' => 'Isère',
                'latitude' => 45.237472022824974,
                'longitude' => 5.402567173055654,
                'email_commercial' => 'ligne.verte@gmail.com',
                'telephone' => '0645218756',
                'type_commerce' => 'Eleveur',
                'en_vedette' => false,
                'user_id' => 5,
            ],
            [
                'nom_entreprise' => 'Ours noir',
                'siret' => 70053051415011,
                'numeroRue' => '18',
                'rue' => 'place de l\'église',
                'ville' => 'Notre-dame de l\'osier',
                'region' => 'Isère',
                'latitude' => 45.241222752081605,
                'longitude' => 5.404349467402648,
                'email_commercial' => 'oursnoir@gmail.com',
                'telephone' => '0754256896',
                'type_commerce' => 'Epicerie',
                'en_vedette' => false,
                'user_id' => 6,
            ],
            [
                'nom_entreprise' => 'Helixir',
                'siret' => 53070051415011,
                'numeroRue' => '33',
                'rue' => 'route des amandes',
                'ville' => 'Notre-dame de l\'osier',
                'region' => 'Isère',
                'latitude' => 45.237785781529695,
                'longitude' => 5.404754534299694,
                'email_commercial' => 'helixir@gmail.com',
                'telephone' => '0642587452',
                'type_commerce' => 'Bijouterie',
                'en_vedette' => false,
                'user_id' => 7,
            ],
        ];

        foreach ($infos as $infos) {
            InfosCommerciales::create([
                'nom_entreprise' => $infos['nom_entreprise'],
                'siret' => $infos['siret'],
                'numeroRue' => $infos['numeroRue'],
                'rue' => $infos['rue'],
                'ville' => $infos['ville'],
                'region' => $infos['region'],
                'latitude' => $infos['latitude'],
                'longitude' => $infos['longitude'],
                'email_commercial' => $infos['email_commercial'],
                'telephone' => $infos['telephone'],
                'type_commerce' => $infos['type_commerce'],
                'en_vedette' => $infos['en_vedette'],
                'user_id' => $infos['user_id'],
            ]);
        }
    }
}
