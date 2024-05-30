<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filieres extends Model
{
    protected $table='filieres';
    protected $primaryKey='nom_filiere';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $fillable = ['nom_filiere'];
}
