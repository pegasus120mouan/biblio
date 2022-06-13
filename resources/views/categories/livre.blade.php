@extends('layouts.master');


@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Liste des livres</th>
                <th scope="col">Nombre de pages</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorie->livres as $livre)
                <tr>
                    <td>{{ $livre->id }}</td>
                    <td><a href='{{ route('categories.livre', ['categorie' => $categorie]) }}'>{{ $livre->titre }}</a>
                    </td>
                    <td><a href=''>{{ $livre->pages }}</a></td>
                    </span></td>
                    <td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
