@extends('layouts.master');


@section('content')
    <a href='{{ route('categories.create') }}' class="btn btn-info">Ajouter une categorie</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Categorie du Livre</th>
                <th scope="col">Nombre de Livre</th>
                <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categorie)
                <tr>
                    <td>{{ $categorie->id }}</td>
                    <td><a href='{{ route('categories.livre', ['categorie' => $categorie]) }}'>{{ $categorie->nom }}</a>
                    </td>
                    <td><a href=''>{{ $categorie->livres->count() }}</a></td>

                    <td>
                        <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST">

                            <a href="{{ route('categories.show', $categorie->id) }}" title="show">
                                <i class="fas fa-eye text-success  fa-lg"></i>
                            </a>

                            <a href="{{ route('categories.edit', $categorie->id) }}">
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
