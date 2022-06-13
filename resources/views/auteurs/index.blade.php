@extends('layouts.master');


@section('content')
    <!--   Code Recherche -->

    <div>
        <div class="mx-auto pull-right">
            <div class="">
                <form action="{{ route('auteurs.index') }}" method="GET">

                    <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search projects">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>
                        <input value="{{ old('nom') }}" type="text" class="form-control mr-2" name="nom"
                            placeholder="Recheche ...." id="nom">
                        <a href="{{ route('auteurs.index') }}" class=" mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="submit" title="Refresh page">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>






    <!-- Fin recherche -->



    <a href='{{ route('auteurs.create') }}' class="btn btn-info">Ajouter un auteur</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Nom auteur</th>
                <th scope="col">Nombre de livre</th>
                <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($auteurs as $auteur)
                <tr>
                    <td>{{ $auteur->id }}</td>
                    <td>{{ $auteur->nom }}</td>
                    <td><a href=''>{{ $auteur->livres->count() }}</a></td>
                    <td>
                        <form action="{{ route('auteurs.destroy', $auteur->id) }}" method="POST">

                            <a href="{{ route('auteurs.show', $auteur->id) }}" title="show">
                                <i class="fas fa-eye text-success  fa-lg"></i>
                            </a>

                            <a href="{{ route('auteurs.edit', $auteur->id) }}">
                                <i class="fas fa-edit  fa-lg"></i>

                            </a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                <i class="fas fa-trash fa-lg text-danger"></i>

                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
