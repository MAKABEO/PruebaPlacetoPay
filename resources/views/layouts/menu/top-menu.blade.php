<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Vegefoods</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">Inicio</a></li>
                <li class="nav-item active"><a href="{{ url('/shop') }}" class="nav-link">Tienda</a></li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Perfil</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="{{ url('/home') }}">Perfil</a>
                            <form action="{{ url('/logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item" href="{{ url('/logout') }}">Cerrar Sesion</button>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>
                @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Ingresa</a></li>

                    @if (Route::has('register'))
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Crea tu cuenta</a></li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>
