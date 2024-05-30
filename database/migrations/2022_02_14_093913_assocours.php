<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Assocours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assocours', function (Blueprint $table) {
            $table->increments("id");
            $table->string('code');
            $table->string('nomdestination');
            $table->foreign('nomdestination')->references('nom')->on('destination');
            $table->string('titre');
            $table->integer('semestre');
            $table->integer('ects');
            $table->integer('nombre');
            $table->longText('contenu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assocours');
    }
}