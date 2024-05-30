<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editeur extends Model
{
    protected $table='editeur';
    protected $primaryKey='uid';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $fillable=["uid"];
}
