<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Index extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('index', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('description');
            $table->string('titreRubrique1');
            $table->string('paragrapheRubrique1');
            $table->string('lienRubrique1');
            $table->string('titreRubrique2');
            $table->string('paragrapheRubrique2');
            $table->string('lienRubrique2');
            $table->string('titreRubrique3');
            $table->string('paragrapheRubrique3');
            $table->string('lienRubrique3');
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
        //
    }
}
