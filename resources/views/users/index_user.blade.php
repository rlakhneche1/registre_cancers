@extends('layouts.app')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste des Utilisateurs :</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              	<thead>
                    <tr>
                      <th>Nom et Prénom</th>
                      <th>Nom d'utilisateur</th>
                      <th>E-Mail</th>
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                    <tr>
                      <td>{{ $user->employe->nom_employe }} {{ $user->employe->prenom_employe}}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td class="text-center">
                        <a href="{{ route('user.show',$user) }}" class="btn btn-primary btn-circle btn-sm">
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