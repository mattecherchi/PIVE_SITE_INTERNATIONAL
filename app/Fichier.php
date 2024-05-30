<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    protected $table='fichiers_eleves';
    protected $primaryKey='id';
    protected $connection = 'mysql';
    protected $fillable=["nom","uid","url","nomprenom"];
}
