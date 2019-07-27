@extends('layouts.app')
@section('content')
	<div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Ajouter un utilisateur :</h1>
              </div>
         	  	<form method="POST" action="{{ route('user.store') }}">
         	  		@csrf
         	  		<div class="form-row">
    					<div class="col">
      						<select name="employe" class="form-control @if($errors->has('employe')) border-danger @endif">
                    			<option value="">Employé</option>
                    			@foreach($employes as $employe)
                      				<option value="{{ $employe->id }}">
                      					{{ $employe->nom_employe }} {{ $employe->prenom_employe }}
                      				</option>
                    			@endforeach
                  			</select>
      						@if($errors->has('employe'))
      						<small class="form-text text-danger">
  								{{ $errors->first('employe') }} 
							</small>
							@endif
    					</div>
    					<div class="col">
      						<input type="text" class="form-control @if($errors->has('username')) border-danger @endif" name="username" placeholder="Nom d'utilisateur...">
      						@if($errors->has('username'))
      						<small class="form-text text-danger">
  								{{ $errors->first('username') }} 
							</small>
							@endif
    					</div>
  					</div>
  					<hr>
  					<div class="form-row">
  						<div class="col">
  							<input type="email" class="form-control @if($errors->has('mail')) border-danger @endif" name="mail" placeholder="E-Mail...">
      						@if($errors->has('mail'))
      						<small class="form-text text-danger">
  								{{ $errors->first('mail') }} 
							</small>
							@endif
  						</div>
  						<div class="col">
  							<input type="password" class="form-control @if($errors->has('password')) border-danger @endif" name="password" placeholder="Mot de passe...">
      						@if($errors->has('password'))
      						<small class="form-text text-danger">
  								{{ $errors->first('password') }} 
							</small>
							@endif
  						</div>
  					</div>
  					<hr>
  					<div class="form-row">
  						<div class="col">
  							<select name="roles[]" class="form-control simple-select2 w-100" multiple>
  								@foreach($roles as $role)
  									<option value="{{ $role->id }}">{{ $role->name }}</option>
  								@endforeach
  							</select>
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
