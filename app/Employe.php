<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    public $timestamps = false;
    protected $fillable = ['nom_employe','prenom_employe','date_naissance_employe','sexe_employe','specialite_id','commune_id'];

    public function lieunaissance()
    {
        return $this->belongsTo('App\Commune','commune_id');
    }

    public function specialite()
    {
        return $this->belongsTo('App\Specialite','specialite_id');
    }
}
