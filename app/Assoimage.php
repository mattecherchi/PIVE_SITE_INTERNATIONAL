<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assoimage extends Model
{
    protected $table="assoimage";
    protected $primaryKey='id';
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $fillable=["url","categorie","nom"];
}
