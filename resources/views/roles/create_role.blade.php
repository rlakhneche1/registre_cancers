@extends('layouts.app')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
     <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Ajouter un rôle :</h1>
              </div>
         	  	<form method="POST" action="{{ route('role.store') }}">
         	  		@csrf
  					   <div class="form-row">
  						    <div class="col">
      						  <input type="text" class="form-control @if($errors->has('name')) border-danger @endif" name="name" placeholder="Nom...">
      						  @if($errors->has('name'))
      							   <small class="form-text text-danger">
  									       {{ $errors->first('name') }} 
							         </small>
							      @endif
    					    </div>
        					<div class="col">
          						<input type="text" class="form-control @if($errors->has('slug')) border-danger @endif" name="slug" placeholder="Abréviation...">
          						@if($errors->has('slug'))
          							<small class="form-text text-danger">
      									{{ $errors->first('slug') }} 
    							      </small>
    							   @endif
        					</div>
  					  </div>
              <hr>
              <div class="form-row">
                <div class="col">
                  <select name="permissions[]" class="form-control simple-select2 w-100" multiple>
                    @foreach($permissions as $permission)
                      <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                    @endforeach
                  </select>
                  @if($errors->has('permissions'))
                    <small class="form-text text-danger">
                      {{ $errors->first('permissions') }} 
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