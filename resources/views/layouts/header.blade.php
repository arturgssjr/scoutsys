<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>

{{--  <ul class="navbar-nav px-3">
    <!-- Authentication Links -->
    @guest
        <li class="nav-item text-nowrap"><a class="nav-link" href="{{ route('login') }}">Entrar</a></li>
        <li class="nav-item text-nowrap"><a class="nav-link" href="{{ route('register') }}">Registrar</a></li>
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
</ul>  --}}