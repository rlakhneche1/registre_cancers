<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilaya extends Model
{
    public $timestamps = true;
    protected $fillable = ['nom', 'matricule'];

    public function dairas()
    {
        return $this->hasMany('App\Daira', 'wilaya_id');
    }
}
