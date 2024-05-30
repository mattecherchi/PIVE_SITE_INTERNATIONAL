<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Assoimage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assoimage', function (Blueprint $table) {
            $table->increments("id");
            $table->string('url');
            $table->string('categorie');
            $table->string('nom');
            $table->foreign('nom')->references('nom')->on('destination');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assoimage');
    }
}