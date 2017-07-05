{{--
           <ul class="nav navbar-nav">
                <li>
                    <a href="#">Articulos</a>
                </li>
                <li>
                    <a href="{{ route('categories.index') }}">Categorias</a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}">Usuarios</a>
                </li>
                <li>
                    <a href="#">Tags</a>
                </li>
            </ul> --}}


<div class="navbar-header">

    <!-- Collapsed Hamburger -->
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <!-- Branding Image -->
    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    </a>
</div>

<div class="collapse navbar-collapse" id="app-navbar-collapse">
    <!-- Left Side Of Navbar -->
    @if(Auth::user() && Auth::user()->type == 'admin')
    <ul class="nav navbar-nav">
            <li>
                <a href="{{ route('articles.index') }}">{{ __('messages.articles') }}</a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}">{{ __('messages.categories') }}</a>
            </li>
            <li>
                <a href="{{ route('users.index') }}">{{ __('messages.users') }}</a>
            </li>
            <li>
                <a href="{{ route('tags.index') }}">{{ __('messages.tags') }}</a>
            </li><li>
                <a href="{{ route('images.index') }}">{{ __('messages.images') }}</a>
            </li>
    </ul>
    @endif

    <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</div>