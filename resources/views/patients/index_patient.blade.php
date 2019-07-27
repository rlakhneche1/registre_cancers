@extends('layouts.app')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste des Patients :</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="liste_patients" width="100%" cellspacing="0">
              	<thead>
                    <tr>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>D-N</th>
                      <th>L-N</th>
                      <th>Séxe</th>
                      <th>Cancer</th>
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
	@include('scripts.script_table')
@endsection