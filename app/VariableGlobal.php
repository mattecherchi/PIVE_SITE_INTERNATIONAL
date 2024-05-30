<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VariableGlobal extends Model
{
    protected $table='variable_globals';
    protected $primaryKey='id';
    public $incrementing = true;
    protected $keyType = 'string';
    protected $connection = 'mysql';
    protected $fillable = ["datelimite_candidature"];
}
