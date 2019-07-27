@extends('layouts.app')
@section('content')
	<div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Déclarer un patient :</h1>
              </div>
         	  	<form method="POST" action="{{ route('patient.store') }}">
         	  		@csrf
  					<div class="form-row">
    					<div class="col">
      						<input type="text" class="form-control @if($errors->has('nom')) border-danger @endif" name="nom" placeholder="Nom...">
      						@if($errors->has('nom'))
      						<small class="form-text text-danger">
  								{{ $errors->first('nom') }} 
							    </small>
							    @endif
    					</div>
    					<div class="col">
      						<input type="text" class="form-control @if($errors->has('prenom')) border-danger @endif" name="prenom" placeholder="Prénom...">
      						@if($errors->has('prenom'))
      						<small class="form-text text-danger">
  								{{ $errors->first('prenom') }} 
							    </small>
							    @endif
    					</div>
  					</div>
  					<hr>
  					<div class="form-row">
  						<div class="col">
      						<input type="text" id="datepicker" class="form-control @if($errors->has('datenaissance')) border-danger @endif" name="datenaissance" placeholder="Date naissance...">
      						@if($errors->has('datenaissance'))
      						<small class="form-text text-danger">
  								{{ $errors->first('datenaissance') }} 
							</small>
							@endif
    					</div>
  						<div class="col">
      						<select name="sexe" class="form-control @if($errors->has('sexe')) border-danger @endif">
      							<option value="">Séxe</option>
      							<option value="M">Masculin</option>
      							<option value="F">Féminin</option>
      						</select>
      						@if($errors->has('sexe'))
      						<small class="form-text text-danger">
  								{{ $errors->first('sexe') }} 
							</small>
							@endif
    					</div>
  					</div>
  					<hr>
  					<div class="form-row">
  						<div class="col">
      						<select id="wilaya" class="form-control">
      							<option value="">Wilaya de naissance</option>
      							@foreach($wilayas as $wilaya)
      								<option value="{{ $wilaya->id }}">{{ $wilaya->nom }}</option>
      							@endforeach
      						</select>
    					</div>
  						<div class="col">
      						<select id="daira" class="form-control">
      							<option value="">Daïra de naissance</option>
      						</select>
    					</div>
  					</div>
            <hr>
            <div class="form-row">
                <div class="col">
                  <select id="commune" name="commune" class="form-control @if($errors->has('commune')) border-danger @endif">
                    <option value="">Commune de naissance</option>
                  </select>
                  @if($errors->has('commune'))
                    <small class="form-text text-danger">
                      {{ $errors->first('commune') }} 
                    </small>
                  @endif
                </div>
                <div class="col">
                  <input type="text" class="form-control" name="adresse" placeholder="Adresse...">
                  @if($errors->has('adresse'))
                    <small class="form-text text-danger">
                      {{ $errors->first('adresse') }} 
                    </small>
                  @endif
                </div>
                <div class="col">
                  <input type="text" class="form-control" name="telephone" placeholder="Téléphone...">
                </div>
              </div>
  					<hr>
  					<div class="form-row">
    					<div class="col">
      						<select name="cancer" class="form-control @if($errors->has('cancer')) border-danger @endif">
      							<option value="">Cancer</option>
      							@foreach($cancers as $cancer)
      								<option value="{{ $cancer->id }}">{{ $cancer->nom_cancer }}</option>
      							@endforeach
      						</select>
      						@if($errors->has('cancer'))
      						<small class="form-text text-danger">
  								{{ $errors->first('cancer') }} 
							     </small>
							   @endif
    					</div>
              <div class="col">
                  <select name="stade" class="form-control @if($errors->has('stade')) border-danger @endif">
                    <option value="">Stade</option>
                    <option value="S1">Stade 1</option>
                    <option value="S2">Stade 2</option>
                    <option value="S3">Stade 3</option>
                    <option value="S4">Stade 4</option>
                  </select>
                  @if($errors->has('stade'))
                    <small class="form-text text-danger">
                      {{ $errors->first('stade') }} 
                    </small>
                  @endif
              </div>
  					</div>
  					<hr>
            <div class="form-row">
              <div class="col">
                <select name="domaineact" class="form-control @if($errors->has('domaineact')) border-danger @endif">
                  <option value="">Domaine d'activité</option>
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
              </div>
              <div class="col">
                <input type="text" class="form-control" name="profession" placeholder="Profession...">
              </div>
            </div>
            <hr>
            <div class="form-row">
              <div class="col">
                <select name="fumeur" class="form-control @if($errors->has('fumeur')) border-danger @endif">
                  <option value="">Choisir...</option>
                  <option value="F">Fumeur</option>
                  <option value="NF">Non Fumeur</option>
                </select>
                @if($errors->has('fumeur'))
                  <small class="form-text text-danger">
                    {{ $errors->first('fumeur') }} 
                  </small>
                @endif
              </div>
              <div class="col">
                <select name="alcoolique" class="form-control @if($errors->has('alcoolique')) border-danger @endif">
                  <option value="">choisir...</option>
                  <option value="A">Alcoolique</option>
                  <option value="NA">Non Alcoolique</option>
                </select>
                @if($errors->has('alcoolique'))
                  <small class="form-text text-danger">
                    {{ $errors->first('alcoolique') }} 
                  </small>
                @endif
              </div>
            </div>
            <hr>
  					<button type="submit" class="btn btn-primary btn-user btn-block">Valider</button>
				</form>       
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('scripts')
	@include('scripts.script_form')
@endsection