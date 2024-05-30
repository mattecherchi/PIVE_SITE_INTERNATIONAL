<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//mettre les conditions et donc ne pas utiliser la forme de tableau
        Schema::create('candidatures', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('prenom');
            $table->string('nom');
            $table->date('date_naissance');
            $table->string('nationalite');
            $table->string('adresse_fixe');
            $table->integer('code_postal');
            $table->string('ville');
            $table->string('tel_fixe')->nullable()->default(null);
            $table->string('portable')->nullable()->default(null);
            $table->boolean('boursier');
            $table->string('region_origine');
            $table->string('annee_entree');
            $table->string('annee_actuelle');
            $table->string('diplome_choisi');
            $table->string('specialisation');
            $table->string('langue1');
            $table->integer('annee_langue1');
            $table->string('langue2')->nullable()->default(null);
            $table->integer('annee_langue2')->nullable()->default(null);
            $table->string('langue3')->nullable();
            $table->integer('annee_langue3')->nullable()->default(null);
            $table->integer('toeic');
            $table->integer('annee_toeic');
            $table->boolean('deja_parti_erasmus');
            $table->string('destination_erasmus')->nullable()->default(null);
            $table->date('date_erasmus')->nullable()->default(null);
            $table->string('choix1');
            $table->string('semestre_choix1');
            $table->string('choix2')->nullable()->default(null);
            $table->string('semestre_choix2')->nullable()->default(null);
            $table->string('choix3')->nullable()->default(null);
            $table->string('semestre_choix3')->nullable()->default(null);
            $table->string('signature');
            $table->boolean('blocked');
            $table->boolean('demande_unblocked')->default(false);
            $table->string('message_unblocked')->nullable()->default(null);
            $table->timestamps();
        });
        Schema::create('filieres', function (Blueprint $table) {
            $table->string('nom_filiere')->primary();
        });
        Schema::create('specialites', function (Blueprint $table) {
            $table->string('nom_spe')->primary();
            $table->string('nom_filiere');
            $table->foreign('nom_filiere')->references('nom_filiere')->on('filieres');
        });
        Schema::create('candidatures_ajout',function(Blueprint $table){
            $table->string('email')->primary();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidatures');
        Schema::dropIfExists('filieres');
        Schema::dropIfExists('specialites');
    }
}
