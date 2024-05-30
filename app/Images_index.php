<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images_index extends Model
{
    protected $table = "images_index";
    protected $primaryKey = 'nom';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $connection = 'mysql';
    protected $fillable = ["nom", "indx"];
}
