<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assoblog extends Model
{
    protected $table='assoblog';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $fillable=["nomdestination","nom","lien"];
}
