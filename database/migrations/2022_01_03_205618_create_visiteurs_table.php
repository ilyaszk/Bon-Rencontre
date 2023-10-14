<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisiteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // TODO Renommer en abonnes
        // Représente le consentement des abonnés à la newsletter
        Schema::create('visiteurs', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('produits', function (Blueprint $table) {
        //     $table->dropColumn('infocom_id');
        //     // $table->dropColumn('reductions_id');
        // });

        // Schema::table('produits', function (Blueprint $table) {
        //     $table->dropColumn('categories_id');
        //     // $table->dropColumn('reductions_id');
        // });

        // Schema::table('images', function (Blueprint $table) {
        //     $table->dropColumn('produits_id');
        // });

        // Schema::table('faq_blocs', function (Blueprint $table) {
        //     $table->dropColumn('faq_categorie_id');
        // });

        // Schema::table('infos_commerciales', function (Blueprint $table) {
        //     $table->dropColumn('user_id');
        // });

        // Schema::table('commandes', function (Blueprint $table) {
        //     $table->dropColumn('user_id');
        // });

        // Schema::table('abonnements', function (Blueprint $table) {
        //     $table->dropColumn('user_id');
        // });

        // Schema::table('abonnements', function (Blueprint $table) {
        //     $table->dropColumn('newsletter_id');
        // });

        // Schema::table('abonnements', function (Blueprint $table) {
        //     $table->dropColumn('visiteur_id');
        // });

        // Schema::table('ligne_commande', function (Blueprint $table) {
        //     $table->dropColumn('produit_id');
        // });

        // Schema::table('ligne_commande', function (Blueprint $table) {
        //     $table->dropColumn('sous_commande_id');
        // });

        // Schema::table('sous_commandes', function (Blueprint $table) {
        //     $table->dropColumn('commande_id');
        // });

        // Schema::table('sous_commandes', function (Blueprint $table) {
        //     $table->dropColumn('infocom_id');
        // });

        Schema::dropIfExists('visiteurs');
    }
}
