<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">

        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="https://www.optixsolutions.co.uk/wp-content/uploads/2017/07/Optix-Logo.svg" class="logoimg logo"
                 alt="Optix Solutions" />
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @if(Auth::guard('web')->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users') }}"><i class="fas fa fa-list"></i> Users</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link"><i class="fas fa fa-user"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"
                           onclick="event.preventDefault();document.querySelector('#logout-form').submit();">
                            <i class="fas fa fa-times-circle"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
