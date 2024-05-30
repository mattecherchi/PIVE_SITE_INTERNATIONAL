<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    //
    protected $table='destination';
    protected $primaryKey='id';
    protected $connection = 'mysql';
    protected $fillable=["nom","intro","temoignages","astucesinfos"];
}
