<header>
    <div class="container-fluid text-bg-dark d-flex justify-content-between align-items-center my-wrap">
        <div>
            <a href="{{ route('home') }}" target="_blank">Vai al sito</a>
        </div>
        <div>
            <ul class="navbar">
                @guest 
                    <li class="nav-item me-4"><a href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}">Registrati</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a href="{{ route('admin.home') }}" class="dropdown-item">Admin</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li> 
                @endguest
            </ul>
        </div>
    </div>
</header>