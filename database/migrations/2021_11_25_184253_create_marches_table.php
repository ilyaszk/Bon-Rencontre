<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marches', function (Blueprint $table) {
            $table->id();
            $table->string('file_path');
            $table->string('titre1');
            $table->string('titre2');
            $table->string('titre3');
            $table->text('para1');
            $table->text('para2');
            $table->text('para3');
            $table->text('date1');
            $table->text('date2');
            $table->text('date3');
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
        Schema::dropIfExists('marches');
    }
}
