<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Assolien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assolien', function (Blueprint $table) {
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
        Schema::dropIfExists('assolien');
    }
}