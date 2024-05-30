<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class msgaccueil extends Model
{
    protected $table='msgaccueil';
    protected $primaryKey='id';
    public $incrementing = true;
    protected $keyType = 'string';
    protected $connection = 'mysql';
    protected $fillable = ["titre","contenu"];
}
