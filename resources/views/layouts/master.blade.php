<!DOCTYPE html>
<html>

<head>
    <title>Gestion de bibliotheque</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>
    <h2>Gestion de bibliotheque</h2>

    <li class="nav-item pcoded-hasmenu">
        <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span
                class="pcoded-mtext">Bibliotheque Gest</span></a>
        <ul class="pcoded-submenu">
            <li class=""><a href="{{ route('livres.index') }}" class=""><span
                        class="pcoded-micon"><i class="feather icon-list"></span></i>Liste des Livres</a>
            </li>
            <li class=""><a href="{{ route('categories.index') }}" class=""><span
                        class="pcoded-micon"><i class="feather icon-list"></span></i>Categorie des livres</a>
            </li>
            <li class=""><a href="{{ route('auteurs.index') }}" class="">Auteurs</a>
            </li>
            <li class=""><a href="bc_collapse.html" class="">Etats</a>
            </li>
            <li class=""><a href="bc_tabs.html" class="">Vehicules
                    attribuées</a>
            </li>
            <li class=""><a href="bc_tabs.html" class="">Contrats</a>
            </li>
        </ul>
    </li>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @yield('content')
            </div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            Swal.fire(
                'Notification',
                '{{ session('success') }}',
                'success'
            )
        @endif
    </script>
</body>

</html>
