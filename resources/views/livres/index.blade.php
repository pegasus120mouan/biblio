@extends('layouts.master');


@section('content')
    <div>
        <div class="mx-auto pull-right">
            <div class="">
                <form action="{{ route('livres.index') }}" method="GET">

                    <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search projects">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>
                        <input value="{{ old('title') }}" type="text" class="form-control mr-2" name="title"
                            placeholder="Recheche ...." id="title">
                        <a href="{{ route('livres.index') }}" class=" mt-1">
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


    <a href='{{ route('livres.create') }}' class="btn btn-info">Ajouter un livre</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Titre du Livre</th>
                <th scope="col">Categorie</th>
                <th scope="col">Pages</th>
                <th scope="col">Auteurs</th>
                <th scope="col">Resume</th>
                <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($livres as $livre)
                <tr>
                    <td>{{ $livre->id }}</td>
                    <td><a href=''>{{ $livre->titre }}</a></td>
                    <td>{{ $livre->categorie->nom }}</td>
                    <td>{{ $livre->pages }}</td>
                    <td>
                        @foreach ($livre->auteurs->pluck('nom') as $auteur)
                            <span>{{ $auteur }} , </span>
                        @endforeach
                    </td>
                    <td>{{ $livre->resume }}</td>


                    <td>
                        <form action="{{ route('livres.destroy', $livre->id) }}" method="POST">

                            <a href="{{ route('livres.show', $livre->id) }}" title="show">
                                <i class="fas fa-eye text-success  fa-lg"></i>
                            </a>

                            <a href="{{ route('livres.edit', $livre->id) }}">
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


    <div class="modal fade" id="add-livre">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">



                </div>
            </div>
        </div>
    </div>
    <script>
        @if (session('success'))
            Swal.fire(
                'Succès',
                "{{ session('success') }}",
                'success'
            )
        @endif

        @if (session('error'))
            Swal.fire(
                'Erreur',
                "{{ session('error') }}",
                'error'
            )
        @endif
    </script>
@endsection
