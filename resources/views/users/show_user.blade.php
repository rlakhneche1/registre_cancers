@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card mb-4">
            <div class="card-header">
                <b>Détails Utilisateur :</b>
            </div>
            <div class="card-body">
                <label>Nom d'utilisateur :</label>&nbsp;&nbsp;<span>{{ $user->name }}</span>
                <br><br>
                <label>E-Mail :</label>&nbsp;&nbsp;<span>{{ $user->email }}</span>
                <br><br>
                <label>Créer le :</label>&nbsp;&nbsp;<span>{{ $user->created_at }}</span>
                <br><br>
                <label>Modifier le :</label>&nbsp;&nbsp;<span>{{ $user->updated_at }}</span>
                <br><br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nom</th>
                            <th>Abréviation</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user->roles as $index => $role)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->slug }}</td>
                                <td class="text-center">
                                    <a href="/detacherrole/{{ $user->id }}/{{ $role->id }}" class="btn btn-danger btn-circle btn-sm">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#affecter">
                    &nbsp;<i class="fas fa-plus"></i>&nbsp;Affecter d'autre rôles
                </button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit_model">
                	&nbsp;<i class="far fa-edit">&nbsp;</i>Modifier
                </button>
                <a href="{{ route('user.destroy', $user) }}" class="btn btn-danger" data-method="DELETE" data-confirm="Etes Vous Sur ?">
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
                        <form id="edit" method="POST" action="{{ route('user.update', $user) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
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
        <!-- Modal -->
        <div class="modal fade" id="affecter" tabindex="-1" role="dialog" aria-labelledby="aff" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Affecter d'autre rôles</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="affecter" method="POST" action="/affecterrole">
                            {{ csrf_field() }}
                            <input type="text" name="id_user" value="{{ $user->id }}" hidden>
                            <select name="roles[]" class="form-control simple-select2 w-100" multiple>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                 @endforeach
                            </select>   
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">
                            Sauvegarder les modifications
                        </button>
                        </form>
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