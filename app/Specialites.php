<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialites extends Model
{
    protected $table='specialites';
    protected $primaryKey='nom_spe';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $fillable = ['nom_spe','nom_filiere'];
}
