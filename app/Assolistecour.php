<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assolistecour extends Model
{
    protected $table='assolistecour';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $fillable=["nomdestination","nom","lien"];
}