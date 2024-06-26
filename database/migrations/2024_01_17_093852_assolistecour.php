<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Assolistecour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assolistecour', function (Blueprint $table) {
            $table->increments("id");
            $table->string('nom');
            $table->string('nomdestination');
            $table->foreign('nomdestination')->references('nom')->on('destination');
            $table->string('lien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assolistecour');
    }
}