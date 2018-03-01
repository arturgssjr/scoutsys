@auth
<!-- Left Side Of Navbar -->

<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() == 'user.index' ? 'active' : '' }}" href="{{ route('user.index') }}">
            Usuários 
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() == 'team.index' ? 'active' : '' }}" href="{{ route('team.index') }}">
            Equipes 
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() == 'category.index' ? 'active' : '' }}" href="{{ route('category.index') }}">
            Categorias 
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() == 'status.index' ? 'active' : '' }}" href="{{ route('status.index') }}">
            Status 
        </a>
    </li>
</ul>
@endauth