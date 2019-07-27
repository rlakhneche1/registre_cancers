<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daira extends Model
{
    public $timestamps = true;
    protected $fillable = ['nom', 'wilaya_id'];

    public function wilaya()
    {
        return $this->belongsTo('App\Wilaya','wilaya_id');
    }

    public function communes()
    {
        return $this->hasMany('App\Commune','daira_id');
    }
}
