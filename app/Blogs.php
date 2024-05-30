<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $table='blogs';
    protected $primaryKey='id';
    public $incrementing = true;
    protected $keyType = 'string';
    protected $connection = 'mysql';
    protected $fillable = ["url"];
}
