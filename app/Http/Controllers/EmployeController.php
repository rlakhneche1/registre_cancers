<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wilaya;
use App\Specialite;
use App\Employe;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = Employe::all();
        return view('employes.index_employe', compact('employes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wilayas = Wilaya::all();
        $specialites = Specialite::all();
        return view('employes.create_employe', compact('wilayas','specialites'));
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
            "specialite" => "required",
        ],[
            "nom.required" => "ce champ est obligatoire",
            "prenom.required" => "ce champ est obligatoire",
            "datenaissance.required" => "ce champ est obligatoire",
            "sexe.required" => "ce champ est obligatoire",
            "commune.required" => "ce champ est obligatoire",
            "specialite.required" => "ce champ est obligatoire",
        ]);

        $employe = Employe::FirstOrCreate([
            "nom_employe" => $request->nom,
            "prenom_employe" => $request->prenom,
            "date_naissance_employe" => $request->datenaissance,
            "sexe_employe" => $request->sexe,
            "specialite_id" => $request->specialite,
            "commune_id" => $request->commune,
        ]);

        return redirect()->route('employe.show', $employe);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employe = Employe::FindOrFail($id);
        $wilayas = Wilaya::all();
        $specialites = Specialite::all();
        return view('employes.show_employe', compact('employe', 'wilayas', 'specialites'));
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
            "specialite" => "required",
        ],[
            "nom.required" => "ce champ est obligatoire",
            "prenom.required" => "ce champ est obligatoire",
            "datenaissance.required" => "ce champ est obligatoire",
            "sexe.required" => "ce champ est obligatoire",
            "commune.required" => "ce champ est obligatoire",
            "specialite.required" => "ce champ est obligatoire",
        ]);
        
        $employe = Employe::FindOrFail($id);

        $employe->update([
            "nom_employe" => $request->nom,
            "prenom_employe" => $request->prenom,
            "date_naissance_employe" => $request->datenaissance,
            "sexe_employe" => $request->sexe,
            "specialite_id" => $request->specialite,
            "commune_id" => $request->commune,
        ]);

        return redirect()->route('employe.show', $employe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employe::destroy($id);
        return redirect()->route('employe.index');
    }
}
