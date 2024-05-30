<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assolien extends Model
{
    protected $table="assolien";
    protected $primaryKey='id';
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $fillable=["nomdestination","nom","lien"];
}
