<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        @auth
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
                <div class="container h3 pt-3 ">
                    <a class="navbar-brand " href="{{ url('/home') }}">
                        <div class="h1">Veterinaria El Corral</div>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            @auth
                                @if (Auth::user()->id == 1)
                                    <li class="nav-item ps-3 active" >
                                        <a class="nav-link {{ request()->is('sucursal.index') ? 'active':''}} "  href="{{ route('sucursal.index') }} " >{{ __('Sucursales') }}</a>
                                    </li>
                                    <li class="nav-item ps-3">
                                        <a class="nav-link {{ request()->is('sucursal.index') ? 'active' : '' }}" href="{{ route('empleado.index') }}">{{ __('Empleados') }}</a>
                                    </li>
                                @endif
                                <li class="nav-item ps-3">
                                    <a class="nav-link {{ request()->is('sucursal.index') ? 'active' : '' }}" href="{{ route('cliente.index') }}">{{ __('Clientes') }}</a>
                                </li>
                                <li class="nav-item ps-3">
                                    <a class="nav-link {{ request()->is('sucursal.index') ? 'active' : '' }}" href="{{ route('producto.index') }}">{{ __('Productos') }}</a>
                                </li>
                            @endauth

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
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
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>


                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('/password') }}">Cambiar Contraseña</a>
                                        <a class="dropdown-item" href="{{ route('usuario.index') }}">Modificar Correo</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
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
            </nav>
        @endauth

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
