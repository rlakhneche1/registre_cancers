@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card mb-4">
            <div class="card-header">
                <b>Détails Permission :</b>
            </div>
            <div class="card-body">
                <label>Nom :</label>&nbsp;&nbsp;<span>{{ $permission->name }}</span>
                <br><br>
                <label>Abréviation :</label>&nbsp;&nbsp;<span>{{ $permission->slug }}</span>
                <br><br>
                <label>Créer le :</label>&nbsp;&nbsp;<span>{{ $permission->created_at }}</span>
                <br><br>
                <label>Modifier le :</label>&nbsp;&nbsp;<span>{{ $permission->updated_at }}</span>
                <br><br>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit_model">
                	&nbsp;<i class="far fa-edit">&nbsp;</i>Modifier
                </button>
                <a href="{{ route('permission.destroy', $permission) }}" class="btn btn-danger" data-method="DELETE" data-confirm="Etes Vous Sur ?">
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
                        <form id="edit" method="POST" action="{{ route('permission.update', $permission) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="text" class="form-control" name="name" value="{{ $permission->name }}">
                            <br>
                            <input type="text" class="form-control" name="slug" value="{{ $permission->slug }}">
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