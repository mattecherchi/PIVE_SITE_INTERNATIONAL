<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assocours extends Model
{
    protected $table="assocours";
    protected $primaryKey='id';
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $fillable=["code","nomdestination","titre","semestre","ects","nombre","contenu"];
}
