<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    public $timestamps = true;
    protected $fillable = ['nom', 'daira_id'];

    public function daira()
    {
        return $this->belongsTo('App\Daira','daira_id');
    }
}
