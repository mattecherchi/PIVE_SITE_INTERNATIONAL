<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    //
    protected $table = 'index';
    public $incrementing = true;
    protected $keyType = 'string';
    protected $connection = 'mysql';
    protected $fillable = ["id", "titre", "description", "titreRubrique1", "paragrapheRubrique1", "lienRubrique1", "titreRubrique2", "paragrapheRubrique2", "lienRubrique2", "titreRubrique3", "paragrapheRubrique3", "lienRubrique3"];
}
