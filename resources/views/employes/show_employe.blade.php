@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card mb-4">
            <div class="card-header">
                <b>Détails employé :</b> {{ $employe->nom_employe }} {{ $employe->prenom_employe }}.
            </div>
            <div class="card-body">
                <label>Nom :</label>&nbsp;&nbsp;<span>{{ $employe->nom_employe }}</span>
                <br><br>
                <label>Prénom :</label>&nbsp;&nbsp;<span>{{ $employe->prenom_employe }}</span>
                <br><br>
                <label>Date de naissance :</label>&nbsp;&nbsp;<span>{{ $employe->date_naissance_employe }}</span>
                <br><br>
                <label>Lieu de naissance :</label>&nbsp;&nbsp;
                <span>
                	{{ $employe->lieunaissance->nom }}, 
                	{{ $employe->lieunaissance->daira->nom }},
                	{{ $employe->lieunaissance->daira->wilaya->nom }}.
                </span>
                <br><br>
                <label>Séxe :</label>&nbsp;&nbsp;
                <span>{{ $employe->sexe_employe == "M" ? "Masculin" : "Féminin" }}</span>
                <br><br>
                <label>Spécialité :</label>&nbsp;&nbsp;
                <span>
                    @if($employe->specialite_id != null)
                        {{ $employe->specialite->nom }}
                    @endif
                </span>
                <br><br>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit_model">
                	&nbsp;<i class="far fa-edit">&nbsp;</i>Modifier
                </button>
                <a href="{{ route('employe.destroy', $employe) }}" class="btn btn-danger" data-method="DELETE" data-confirm="Etes Vous Sur ?">
                	&nbsp;<i class="far fa-trash-alt"></i>&nbsp;Supprimer
                </a>
            </div>
        </div>
        <!-- Modal -->
		<div class="modal fade" id="edit_model" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title" id="exampleModalLabel">Modifications :</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
      				<div class="modal-body">
        				<form id="edit" method="POST" action="{{ route('employe.update', $employe) }}">
        					{{ csrf_field() }}
                      		{{ method_field('PUT') }}
        					<input type="text" name="nom" class="form-control" placeholder="Nom" value="{{ $employe->nom_employe }}">
        					<br>
        					<input type="text" name="prenom" class="form-control" placeholder="Prénom" value="{{ $employe->prenom_employe }}">
        					<br>
        					<input type="text" name="datenaissance" class="form-control" placeholder="Date de naissance" value="{{ $employe->date_naissance_employe }}">
        					<br>
        					<select name="sexe" class="form-control">
        						<option value="{{ $employe->sexe_employe }}">
        							{{ $employe->sexe_employe == "M" ? "Masculin" : "Féminin" }}
        						</option>
        						<option value="M">Masculin</option>
        						<option value="F">Féminin</option>
        					</select>
        					<br>
        					<select id="wilaya" class="form-control">
        						<option value="{{ $employe->lieunaissance->daira->wilaya->id }}">
        							{{ $employe->lieunaissance->daira->wilaya->nom }}
        						</option>
        						@foreach($wilayas as $wilaya)
      								<option value="{{ $wilaya->id }}">{{ $wilaya->nom }}</option>
      							@endforeach
        					</select>
        					<br>
        					<select id="daira" class="form-control">
        						<option value="{{ $employe->lieunaissance->daira->id }}">
        							{{ $employe->lieunaissance->daira->nom }}
        						</option>
        					</select>
        					<br>
        					<select id="commune" name="commune" class="form-control">
        						<option value="{{ $employe->lieunaissance->id }}">
        							{{ $employe->lieunaissance->nom }}
        						</option>
        					</select>
        					<br>
        					<select name="specialite" class="form-control">
                                @if($employe->specialite_id != null)
        						<option value="{{ $employe->specialite->id }}">
        							{{ $employe->specialite->nom }}
        						</option>
                                @endif
        						@foreach($specialites as $specialite)
                      				<option value="{{ $specialite->id }}">{{ $specialite->nom }}</option>
                    			@endforeach
        					</select>
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