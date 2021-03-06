<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('before-script')
</head>
<body>
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('home') }}">
                <i class="far fa-chart-bar"></i> {{ config('app.name', 'Laravel') }}
            </a>
            {{--  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">  --}}
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav px-3">
                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">Entrar</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">Registrar</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sair
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>  

        <div class="container-fluid">
            <di class="row">
                <nav class="col-md-2 d-none d-md-block bd-light sidebar">
                    <div class="sidebar-sticky">
                        @auth
                        <!-- Left Side Of Navbar -->
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">Usuários</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('team.index') }}">Equipes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.index') }}">Categorias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('status.index') }}">Status</a>
                            </li>
                        </ul>
                        @endauth
                    </div>
                </nav>
            </di>
        </div>


        {{--  <nav class="navbar navbar-dark navbar-expand-md bg-dark navbar-laravel">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <i class="far fa-chart-bar"></i> {{ config('app.name', 'Laravel') }}
                </a>

                <!-- Collapsed Hamburger -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @auth
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCadastro" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Cadastros
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownCadastro">
                                <a class="dropdown-item" href="{{ route('user.index') }}">Usuários</a>
                                <a class="dropdown-item" href="{{ route('team.index') }}">Equipes</a>
                                <a class="dropdown-item" href="{{ route('category.index') }}">Categorias</a>
                                <a class="dropdown-item" href="{{ route('status.index') }}">Status</a>
                            </div>
                        </li>
                    </ul>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">Entrar</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Registrar</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>  --}}

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav> 

    <main class="py-4"> 
        @yield('content')
    </main>
    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('after-script')
</body>
</html>
