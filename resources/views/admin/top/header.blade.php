<nav class="navbar navbar-expand-lg navbar-light border-bottom" style="background:#0C2E8A;">
    <button class="btn btn-success btn-xs" id="sidebarToggle">Show Menu</button>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation"><span
            class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item text-warning">
                        <a class="nav-link text-warning " href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-warning" href="{{ route('register') }}">
                            {{ __('Register')}}
                        </a>
                    </li>
                @endif
            @else
                <li class="nav-item active">
                    <a class="nav-link text-white mx-3" href="{{route('app.home')}}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-warning" id="navbarDropdown" href="#"
                       role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">{{ Auth::User()->name }} </a>
                    <div class="dropdown-menu dropdown-menu-end bg-dark" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-white border-bottom p-3" href="#!">Something</a>
                        <a class="dropdown-item text-white p-3" href="#!">Something</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-warning font-weight-bold p-3"
                           href="{{ route('logout') }}" onclick="event.preventDefault();
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
</nav>
