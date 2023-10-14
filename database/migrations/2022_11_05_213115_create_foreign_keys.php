<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->foreignId('categories_id')->constrained('categorie_produits')->onDelete('cascade');
        });

        Schema::table('produits', function (Blueprint $table) {
            $table->foreignId('infocom_id')->constrained('infos_commerciales')->onDelete('cascade');
        });

        Schema::table('reductions', function (Blueprint $table) {
            $table->foreignId('produits_id')->constrained('produits')->onDelete('cascade');
        });

        Schema::table('images', function (Blueprint $table) {
            $table->foreignId('produits_id')->constrained('produits')->onDelete('cascade');
        });

        Schema::table('faq_blocs', function (Blueprint $table) {
            $table->foreignId('faq_categorie_id')->constrained('faq_categories')->onDelete('cascade');
        });

        Schema::table('infos_commerciales', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->nullable()->unique();
        });

        Schema::table('ligne_commande', function (Blueprint $table) {
            $table->foreignId('produit_id')->constrained('produits')->onDelete('cascade')->nullable()->unique();
        });

        Schema::table('ligne_commande', function (Blueprint $table) {
            $table->foreignId('sous_commande_id')->constrained('sous_commandes')->onDelete('cascade')->nullable()->unique();
        });

        Schema::table('sous_commandes', function (Blueprint $table) {
            $table->foreignId('commande_id')->constrained('commandes')->onDelete('cascade')->nullable()->unique();
        });

        Schema::table('sous_commandes', function (Blueprint $table) {
            $table->foreignId('infocom_id')->constrained('infos_commerciales')->onDelete('cascade')->nullable()->unique();
        });

        Schema::table('commandes', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->nullable()->unique();
        });

        Schema::table('qrcodes', function (Blueprint $table) {
            $table->foreignId('commande_id')->constrained('commandes')->onDelete('cascade')->nullable()->unique();
        });

        Schema::table('qrcodes', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->nullable()->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreign_keys');
    }
}
