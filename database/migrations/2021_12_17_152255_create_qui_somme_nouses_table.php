<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuiSommeNousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qui_somme_nouses', function (Blueprint $table) {
            $table->id();
            $table->string('file_path1');
            $table->string('file_path2');
            $table->string('titre1');
            $table->string('titre2');
            $table->string('titre3');
            $table->string('titre4');
            $table->text('para1');
            $table->text('para2');
            $table->text('para3');
            $table->text('para4');
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
        Schema::dropIfExists('qui_somme_nouses');
    }
}
