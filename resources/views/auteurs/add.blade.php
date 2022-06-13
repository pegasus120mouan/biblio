@extends('layouts.master');
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Attention. Tous les champs sont obligatoires<br><br></strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('auteurs.store') }}" method="POST">
        @csrf

        <div class="form-group row">
            <label for="titre" class="col-4 col-form-label">Nom de l'auteur</label>
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-address-book"></i>
                        </div>
                    </div>
                    <input id="titre" name="nom" type="text" class="form-control" required="required">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </form>
@endsection
