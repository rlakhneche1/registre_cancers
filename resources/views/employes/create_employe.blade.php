@extends('layouts.app')
@section('content')
	<div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Ajouter un employé :</h1>
              </div>
         	  	<form method="POST" action="{{ route('employe.store') }}">
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
                  <select name="specialite" class="form-control @if($errors->has('specialite')) border-danger @endif">
                    <option value="">Spécialité</option>
                    @foreach($specialites as $specialite)
                      <option value="{{ $specialite->id }}">{{ $specialite->nom }}</option>
                    @endforeach
                  </select>
                  @if($errors->has('specialite'))
                  <small class="form-text text-danger">
                  {{ $errors->first('specialite') }} 
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