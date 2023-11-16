<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nutricio') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/inicio">
                <img src="{{ asset('images/logo2.jpg') }}" class="img-fluid rounded-start" style="height: 25px; width: 30px;">
                {{ config('app.name', 'Nutricio') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h2 class="offcanvas-title" id="offcanvasNavbarLabel">Nutricio</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <hr style="color: #000000;" />
                        <h5><a class="nav-link active" aria-current="page" href="/inicio">Pagina principal</a></h5>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pacientes
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="/patients">Lista de pacientes</a></li>
                              <li>
                                <hr class="dropdown-divider">
                              </li>
                              <li><a class="dropdown-item" href="/patients/create">Agregar Paciente</a></li>
                            </ul>
                          </li>
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Comidas
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="/foods">Lista de comidas</a></li>
                              <li>
                                <hr class="dropdown-divider">
                              </li>
                              <li><a class="dropdown-item" href="/foods/create">Agregar Comida</a></li>
                            </ul>
                          </li> 
                          <hr style="color: #000000;" />
                          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Cuenta</h5>

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                    <hr style="color: #000000;" />
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Buscar un paciente</h5><br>
                    <form action="{{ route('search') }}" method="GET" class="d-flex" role="search">
                        <input type="search" name="query" placeholder="Buscar..." class="form-control me-2" >
                        <button class="btn btn-outline-warning" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
