@extends('layouts.app')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste des employés :</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              	<thead>
                    <tr>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Date de naissance</th>
                      <th>Séxe</th>
                      <th>Spécialité</th>
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($employes as $employe)
                		<tr>
                			<td>{{ $employe->nom_employe }}</td>
                			<td>{{ $employe->prenom_employe }}</td>
                			<td>{{ $employe->date_naissance_employe }}</td>
                			<td>{{ $employe->sexe_employe == "M" ? "Masculin" : "Féminin" }}</td>
                			<td>
                        @if($employe->specialite_id != null)
                          {{ $employe->specialite->nom }}
                        @endif
                      </td>
                			<td class="text-center">
                				<a href="{{ route('employe.show',$employe) }}" class="btn btn-primary btn-circle btn-sm">
                    				<i class="fas fa-info-circle"></i>
                  				</a>
                			</td>
                		</tr>
                	@endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
	@include('scripts.script_table')
@endsection