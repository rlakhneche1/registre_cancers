<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancer extends Model
{
    public $timestamps = false;
    protected $fillable = ['nom_cancer'];

    public function patient()
    {
        return $this->belongsTo('App\Patient','cancer_id');
    }
}
