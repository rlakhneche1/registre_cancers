<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public $timestamps = true;
    protected $fillable = ['code_patient', 'nom_patient', 'prenom_patient', 'date_naissance_patient', 'sexe_patient', 'commune_id', 'cancer_id', 'stade_cancer', 'domaine_activite', 'profession', 'fumeur', 'alcool', 'created_at', 'updated_at','adresse','telephone'];

    public function lieunaissance()
    {
        return $this->belongsTo('App\Commune','commune_id');
    }

    public function cancer()
    {
        return $this->belongsTo('App\Cancer','cancer_id');
    }
}
