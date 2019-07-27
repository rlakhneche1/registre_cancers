@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card mb-4">
            <div class="card-header">
                <b>Détails Patient :</b>
            </div>
            <div class="card-body">
                <label>Code du patient :</label>&nbsp;&nbsp;<span>{{ $patient->code_patient }}</span>
                <br><br>
                <label>Nom :</label>&nbsp;&nbsp;<span>{{ $patient->nom_patient }}</span>
                <br><br>
                <label>Prénom :</label>&nbsp;&nbsp;<span>{{ $patient->prenom_patient }}</span>
                <br><br>
                <label>Date de naissance :</label>&nbsp;&nbsp;<span>{{ $patient->date_naissance_patient }}</span>
                <br><br>
                <label>Séxe :</label>&nbsp;&nbsp;
                <span>{{ $patient->sexe_patient == "M" ? "Masculin" : "Féminin" }}</span>
                <br><br>
                <label>Lieu de naissance :</label>&nbsp;&nbsp;
                <span>
                    {{ $patient->lieunaissance->nom }},
                    {{ $patient->lieunaissance->daira->nom }},
                    {{ $patient->lieunaissance->daira->wilaya->nom }}
                </span>
                <br><br>
                <label>Adresse :</label>&nbsp;&nbsp;<span>{{ $patient->adresse }}</span>
                <br><br>
                @if($patient->telephone != null)
                <label>Téléphone :</label>&nbsp;&nbsp;<span>{{ $patient->telephone }}</span>
                <br><br>
                @endif
                <label>Domaine d'activité :</label>&nbsp;&nbsp;<span>{{ $patient->domaine_activite }}</span>
                <br><br>
                @if($patient->profession != null)
                <label>Profession :</label>&nbsp;&nbsp;<span>{{ $patient->profession }}</span>
                <br><br>
                @endif
                <label>Cancer :</label>&nbsp;&nbsp;<span>{{ $patient->cancer->nom_cancer }}</span>
                <br><br>
                <label>Stade Cancer :</label>&nbsp;&nbsp;
                <span>
                    @if($patient->stade_cancer == "S1")
                        <span>Stade 1</span>
                    @elseif($patient->stade_cancer == "S2")
                        <span>Stade 2</span>
                    @elseif($patient->stade_cancer == "S3")
                        <span>Stade 3</span>
                    @elseif($patient->stade_cancer == "S4")
                        <span>Stade 4</span>
                    @endif
                </span>
                <br><br>
                <label>Tabac :</label>&nbsp;&nbsp;
                <span>{{ $patient->fumeur == "F" ? "Fumeur" : "Non Fumeur" }}</span>
                <br><br>
                <label>Alcool :</label>&nbsp;&nbsp;
                <span>{{ $patient->alcool == "A" ? "Alcoolique" : "Non Alcoolique" }}</span>
                <br><br>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit_model">
                	&nbsp;<i class="far fa-edit">&nbsp;</i>Modifier
                </button>
                <a href="{{ route('patient.destroy', $patient) }}" class="btn btn-danger" data-method="DELETE" data-confirm="Etes Vous Sur ?">
                	&nbsp;<i class="far fa-trash-alt"></i>&nbsp;Supprimer
                </a>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="edit_model" tabindex="-1" role="dialog" aria-labelledby="edit_model" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modification :</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="edit" method="POST" action="{{ route('patient.update', $patient) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="text" class="form-control" name="nom" value="{{ $patient->nom_patient }}">
                            <br>
                            <input type="text" class="form-control" name="prenom" value="{{ $patient->prenom_patient }}">
                            <br>
                            <input type="text" class="form-control" name="datenaissance" value="{{ $patient->date_naissance_patient }}">
                            <br>
                            <select name="sexe" class="form-control">
                                <option value="{{ $patient->sexe_patient }}">
                                    {{ $patient->sexe_patient == "M" ? "Masculin" : "Féminin" }}
                                </option>
                                <option value="M">Masculin</option>
                                <option value="F">Féminin</option>
                            </select>
                            <br>
                            <select id="wilaya" class="form-control">
                                <option value="{{ $patient->lieunaissance->daira->wilaya->id }}">
                                    {{ $patient->lieunaissance->daira->wilaya->nom }}
                                </option>
                                @foreach($wilayas as $wilaya)
                                    <option value="{{ $wilaya->id }}">{{ $wilaya->nom }}</option>
                                @endforeach
                            </select>
                            <br>
                            <select id="daira" class="form-control">
                                <option value="{{ $patient->lieunaissance->daira->id }}">
                                    {{ $patient->lieunaissance->daira->nom }}
                                </option>
                            </select>
                            <br>
                            <select id="commune" name="commune" class="form-control">
                                <option value="{{ $patient->lieunaissance->id }}">
                                    {{ $patient->lieunaissance->nom }}
                                </option>
                            </select>
                            <br>
                            <select name="cancer" class="form-control">
                                <option value="{{ $patient->cancer->id }}">
                                    {{ $patient->cancer->nom_cancer }}
                                </option>
                                @foreach($cancers as $cancer)
                                    <option value="{{ $cancer->id }}">{{ $cancer->nom_cancer }}</option>
                                @endforeach
                            </select>
                            <br>
                            <input type="text" class="form-control" name="adresse" value="{{ $patient->adresse }}" placeholder="Adresse...">
                            @if($errors->has('adresse'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('adresse') }} 
                                </small>
                            @endif
                            <br>
                            <input type="text" class="form-control" name="telephone" value="{{ $patient->telephone }}" placeholder="Téléphone...">
                            <br>
                            <select name="domaineact" class="form-control @if($errors->has('domaineact')) border-danger @endif">
                                <option value="{{ $patient->domaine_activite }}">{{ $patient->domaine_activite }}</option>
                                <option value="Aucune">Aucune</option>
                                <option value="Administration">Administration</option>
                                <option value="Agriculture">Agriculture</option>
                                <option value="Foret et pêche">Foret et pêche</option>
                                <option value="Industrie et artisanat">Industrie et artisanat</option>
                                <option value="Bâtiments et travaux">Bâtiments et travaux</option>
                                <option value="Commerce">Commerce</option>
                                <option value="Education">Education</option>
                                <option value="Services">Services</option>
                                <option value="Autres">Autres</option>
                            </select>
                            @if($errors->has('domaineact'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('domaineact') }} 
                                </small>
                            @endif
                            <br>
                            <input type="text" class="form-control" name="profession" value="{{ $patient->profession }}" placeholder="Profession...">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button id="submit_edition" type="button" class="btn btn-primary">
                            Sauvegarder les modifications
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    @include('scripts.script_form')
@endsection