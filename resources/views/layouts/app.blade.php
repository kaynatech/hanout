<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />

    <!-- add before </body> -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/listree/dist/listree.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/filepond.min.css') }}" rel="stylesheet">
    <link href="/css/filepond.min.css" rel="stylesheet">

    



</head>
<script>
</script>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'KaynaTech') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Articles
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('articles') }}">
                                    Liste Des Article
                                </a>
                                <a class="dropdown-item" href="{{ route('create_article') }}">
                                    Ajouter un article
                                </a>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Categories
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('categories') }}">
                                    Liste Des Categories
                                </a>
                                <a class="dropdown-item" href="{{ route('create_categorie') }}">
                                    Ajouter une Categorie
                                </a>

                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vente_temp') }}">
                                Ventes Temp
                                <span class="badge badge-light" id="vente_temp_badge">
                                    {{ \App\models\VenteTemp::count() }}
                                </span>
                            </a>
                        </li>


                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Inventaire
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('inventaire', ['type' => 'all']) }}">
                                    Inventaure
                                    <span class="badge badge-light" id="vente_temp_badge">
                                        {{ \App\models\Inventaire::count() }}
                                    </span>
                                </a>
                                <a class="dropdown-item" href="{{ route('inventaire', ['type' => 'vente']) }}">
                                    Inventaure ventes
                                </a>
                                <a class="dropdown-item" href="{{ route('inventaire', ['type' => 'perte']) }}">
                                    Inventaire des perte
                                </a>
                                <a class="dropdown-item" href="{{ route('inventaire', ['type' => 'trouver']) }}">
                                    Inventaire des trouver
                                </a>
                                <a class="dropdown-item" href="{{ route('inventaire', ['type' => 'achat']) }}">
                                    Inventaire des achat
                                </a>
                                <a class="dropdown-item" href="{{ route('inventaire', ['type' => 'endomager']) }}">
                                    Inventaire des endomager
                                </a>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Historique
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('ventes_history') }}">
                                    Historique des ventes
                                </a>
                                <a class="dropdown-item" href="{{ route('rendus_history') }}">
                                    Historique des rendus
                                </a>
                                <a class="dropdown-item" href="{{ route('achats_history') }}">
                                    Historique des achats
                                </a>
                                <a class="dropdown-item" href="{{ route('pertes_history') }}">
                                    Historique des pertes
                                </a>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Historique des caisses
                                </a>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                    @foreach (App\models\User::assossier()->get() as $user )
                                    <a class="dropdown-item" href="{{ route('caisse_history' , ['id' => $user->id]) }}">
                                        {{ $user->name  }}
                                    </a>
                                    @endforeach
                                </div>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Action
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('history_facture_achat') }}">
                                    Bon achat non valide
                                </a>
                                <a class="dropdown-item" href="{{ route('create_facture_achat') }}">
                                    nouveau bon achat
                                </a>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Verification des caisses
                                </a>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                    @foreach (App\models\User::assossier()->get() as $user )
                                    <a class="dropdown-item" href="{{ route('verification_caisse' , ['id' => $user->id]) }}">
                                        {{ $user->name  }}
                                    </a>
                                    @endforeach
                                </div>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Declaration
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('declaration.perte') }}">
                                    Perte en attend
                                </a>
                                <a class="dropdown-item" href="{{ route('declaration.trouver') }}">
                                    Trouver en attend
                                </a>
                                <a class="dropdown-item" href="{{ route('declaration.endomager') }}">
                                    Endomager en attend
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Statistic
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('caisse_charts') }}">
                                    Statistic des Caisse
                                </a>
                                <a class="dropdown-item" href="{{ route('ventes_charts') }}">
                                    Statistic des ventes
                                </a>
                                <a class="dropdown-item" href="{{ route('achats_charts') }}">
                                    Statistic des Achats
                                </a>
                                <a class="dropdown-item" href="{{ route('pertes_charts') }}">
                                    Statistic des pertes
                                </a>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Graph Des Caise
                                </a>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                    @foreach (App\models\User::assossier()->get() as $user )
                                    <a class="dropdown-item" href="{{ route('caisse_charts_graph' , ['id' => $user->id]) }}">
                                        {{ $user->name  }}
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Site Web
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('commandes-site') }}">
                                    Liste des commandes
                                </a>
                                <a class="dropdown-item" href="">
                                    List des client
                                </a>

                            </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>

    </div>

    <script>
        setTimeout(() => {
            update_badge()
        }, 300);
    </script>

    <script src="{!! asset('js/sweetalert2.js')!!}"></script>


</body>

</html>
