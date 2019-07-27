<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    public $timestamps = false;
    protected $fillable = ['nom'];
}
