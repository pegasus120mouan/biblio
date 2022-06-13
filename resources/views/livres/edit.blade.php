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
    <form action="{{ route('livres.update', $livre->id) }}" method="POST">
        @method('PATCH')
        @csrf
        <h5>Modification livre</h5>
        <hr>

        <div class="form-group row">
            <label for="titre" class="col-4 col-form-label">Titre du livre</label>
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-address-book"></i>
                        </div>
                    </div>
                    <input id="titre" name="titre" type="text" class="form-control" required="required"
                        value="{{ $livre->titre }}">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="pages" class="col-4 col-form-label">Pages</label>
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-sort-numeric-desc"></i>
                        </div>
                    </div>
                    <input id="pages" name="pages" type="text" class="form-control" required="required"
                        value="{{ $livre->pages }}">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="textarea" class="col-4 col-form-label">Resumé</label>
            <div class="col-8">
                <textarea id="resume" name="resume" cols="40" rows="5" class="form-control"><?= $livre->resume ?></textarea>
            </div>
        </div>



        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </div>
    </form>


@endsection
