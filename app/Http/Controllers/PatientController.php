<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Daira;
use App\Wilaya;
use App\Patient;
use App\Cancer;
use Carbon\Carbon;
use DataTables;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index_patient', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wilayas = Wilaya::all();
        $cancers = Cancer::all();
        return view('patients.create_patient', compact('wilayas','cancers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "datenaissance" => "required",
            "sexe" => "required",
            "commune" => "required",
            "cancer" => "required",
            "stade" => "required",
            "domaineact" => "required",
            "fumeur" => "required",
            "alcoolique" => "required",
            "adresse" => "required",
        ],[
            "nom.required" => "ce champ est obligatoire",
            "prenom.required" => "ce champ est obligatoire",
            "datenaissance.required" => "ce champ est obligatoire",
            "sexe.required" => "ce champ est obligatoire",
            "commune.required" => "ce champ est obligatoire",
            "cancer.required" => "ce champ est obligatoire",
            "stade.required" => "ce champ est obligatoire",
            "domaineact.required" => "ce champ est obligatoire",
            "fumeur.required" => "ce champ est obligatoire",
            "alcoolique.required" => "ce champ est obligatoire",
            "adresse.required" => "ce champ est obligatoire",
        ]);

        $patient = Patient::FirstOrCreate([
            "nom_patient" => $request->nom,
            "prenom_patient" => $request->prenom,
            "date_naissance_patient" => $request->datenaissance,
            "sexe_patient" => $request->sexe,
            "stade_cancer" => $request->stade,
            "domaine_activite" => $request->domaineact,
            "profession" => $request->profession,
            "fumeur" => $request->fumeur,
            "alcool" => $request->alcoolique,
            "commune_id" => $request->commune,
            "cancer_id" => $request->cancer,
            "adresse" => $request->adresse,
            "telephone" => $request->telephone,
        ]);

        $sexe = $request->sexe;
        $id = $patient->id;
        $date = Carbon::today();

        $patient->update([
            "code_patient" => $sexe."/".$date->year."/".$id,
        ]);

        return redirect()->route('patient.show', $patient);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::FindOrFail($id);
        $wilayas = Wilaya::all();
        $cancers = Cancer::all();
        return view('patients.show_patient', compact('patient','wilayas','cancers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "datenaissance" => "required",
            "sexe" => "required",
            "commune" => "required",
            "cancer" => "required",
        ]);

        $patient = Patient::FindOrFail($id);

        $patient->update([
            "nom_patient" => $request->nom,
            "prenom_patient" => $request->prenom,
            "date_naissance_patient" => $request->datenaissance,
            "sexe_patient" => $request->sexe,
            "domaine_activite" => $request->domaineact,
            "profession" => $request->profession,
            "commune_id" => $request->commune,
            "cancer_id" => $request->cancer,
            "adresse" => $request->adresse,
            "telephone" => $request->telephone,
        ]);

        return redirect()->route('patient.show', $patient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Patient::destroy($id);
        return redirect()->route('patient.index');
    }

    public function get_dairas($id_wilaya)
    {
        $wilaya = Wilaya::FindOrFail($id_wilaya);
        return $wilaya->dairas;
    }

    public function get_communes($id_daira)
    {
        $daira = Daira::FindOrFail($id_daira);
        return $daira->communes;
    }

    public function get_patient_masculin()
    {
        $nb = Patient::where("sexe_patient","M")->get()->count();
        return $nb;
    }

    public function get_cancer_frequant()
    {
        $patients = Patient::all();
        $frequence = 0;
        $valeur = 0;
        $compteur = 0;
        $t = array();
        foreach ($patients as $patient) {
            array_push($t, $patient->cancer_id);
        }
        $size = sizeof($t);
        for ($i=0; $i < $size; $i++){
            $compteur = 0 ;
            for ($j = 0 ; $j < $size; $j++){

                if ( $t[$i] == $t[$j]) {

                    $compteur = $compteur + 1;
                }
            }
            if($compteur > $frequence) {

                $frequence = $compteur ;
                $valeur = $t[$i] ;
            }
        }
        $cancer = Cancer::FindOrFail($valeur);
        return $cancer;
    }

    public function liste_canceraux()
    {
        $patients = Patient::with('lieunaissance','cancer')->get();
        return DataTables::of($patients)
            ->addColumn('sexe', function ($patient) {
                return $patient->sexe_patient == "M" ? "Masculin" : "Féminin";
            })
            ->addColumn('lieunaissance', function ($patient) {
                return $patient->lieunaissance->nom.', '.$patient->lieunaissance->daira->nom.', '.$patient->lieunaissance->daira->wilaya->nom;
            })
            ->addColumn('cancer', function ($patient) {
                return $patient->cancer->nom_cancer;
            })
            ->addColumn('action', function ($patient) {
                return '<a href="/patient/'.$patient->id.'" class="btn btn-xs btn-primary"><i class="fa fa-info"></i></a>';
            })
            ->make(true);
    }
}
