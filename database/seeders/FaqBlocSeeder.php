<?php

namespace Database\Seeders;

use App\Models\FaqBloc;
use Illuminate\Database\Seeder;

class FaqBlocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FaqBloc::create([
            'question' => 'Le produit que vous souhaitez acheter n’est plus en vente sur le site ?',
            'reponse' => 'Le produit que vous souhaitez est momentanément en rupture de stock ? Pas de panique ! Nous renouvelons très régulièrement les stocks.
            Vous ne pouvez pas attendre et vous souhaitez acquérir tout de suite votre produit ? Il se peut que le produit tant convoité soit encore disponible en magasin. Nous vous invitons à appeler nos équipes en magasin au 02 62 94 79 79 (prix d\'un appel local) 6j/7 de 9h à 18h30.',
            'faq_categorie_id' => 1,
        ]);

        FaqBloc::create([
            'question' => 'Les conditions générales de ventes sur internet sont-elles les mêmes qu’en magasin ?',
            'reponse' => 'Les CGV des commandes passées en magasin sont disponibles dans votre magasin Darty. Vous trouverez les CGV des commandes passées sur notre site internet reunion.darty-dom.com',
            'faq_categorie_id' => 1,
        ]);

        FaqBloc::create([
            'question' => 'Vous pouvez payer votre commande sur notre site bon-rencontre avec les moyens de paiement suivant :',
            'reponse' => 'Carte bancaire : CB, VISA, MasterCard
            Paypal
            Carte de crédit Cafinéo Darty Cpay',
            'faq_categorie_id' => 2,
        ]);

        FaqBloc::create([
            'question' => 'Comment fonctionne le retrait d’un produit commandé ?',
            'reponse' => 'Vous souhaitez acheter vos produits en ligne et venir les retirer en magasin ? C’est possible ! Lors de la validation de votre panier, vous pouvez sélectionner deux modes de disponibilité de votre appareil : la livraison à domicile ou le retrait en magasin Click&Collect®.

            Votre commande pourra être retirée gratuitement en magasin une heure après la validation de votre commande.

            Le délai de mise à disposition peut varier selon les stocks disponibles en magasin. Un mail vous sera envoyé, sur l’adresse mail renseigné lors de la commande, pour vous indiquer la date à partir de laquelle votre commande pourra être retirée en magasin.',
            'faq_categorie_id' => 3,
        ]);

        FaqBloc::create([
            'question' => 'Comment accéder à ma facture ?',
            'reponse' => 'Votre facture vous sera remise dans votre colis lors de la livraison ou du retrait en magasin.',
            'faq_categorie_id' => 3,
        ]);

        FaqBloc::create([
            'question' => 'Comment s’inscrire sur reunion.darty-dom.com ?',
            'reponse' => 'Il suffit de se rendre sur la page d’accueil de reunion.darty-dom.com et de cliquer sur “me connecter”.

            Il est important que vos coordonnées soient exactes : vos prochaines commandes seront livrées à l’adresse enregistrée. Pensez aussi à nous donner votre numéro de téléphone, indispensable pour convenir d’un horaire de livraison avec notre transporteur lors de vos commandes.',
            'faq_categorie_id' => 4,
        ]);

        FaqBloc::create([
            'question' => 'J’ai oublié mon mot de passe ! Comment faire ?',
            'reponse' => 'Tout simplement, cliquez sur le lien “mot de passe oublié ?”, entrez l’adresse email renseignée lors de votre inscription et nous vous ferons parvenir votre mot de passe par email dans les plus brefs délais.',
            'faq_categorie_id' => 4,
        ]);

        FaqBloc::create([
            'question' => 'Pourquoi recevoir la newsletter ?',
            'reponse' => 'En recevant la newsletter, vous bénéficiez en avant-première des nouveautés, des promotions, des ventes privées et des bons plans en magasin et en ligne sur reunion.darty-dom.com.',
            'faq_categorie_id' => 5,
        ]);

        FaqBloc::create([
            'question' => 'Vous ne souhaitez plus recevoir notre newsletter ?',
            'reponse' => 'Rien de plus simple, vous pouvez vous désinscrire en cliquant sur le lien “se désinscrire” en bas de chacune de nos newsletters. Si vous possédez un compte, vous pouvez également vous désinscrire dans la section “mon compte”',
            'faq_categorie_id' => 5,
        ]);
    }
}
