<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@hasSection('title') @yield('title') | @endif {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	 @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/dashboard') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
					@auth()
                    <ul class="navbar-nav mr-auto">
						<!--Nav Bar Hooks - Do not delete!!-->
						<li class="nav-item">
                            <a href="{{ url('/pelicula') }}" class="nav-link"><i class="fas fa-film text-info"></i> Pelicula</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/alquiler') }}" class="nav-link"><i class="fas fa-dollar-sign text-info"></i> Alquiler</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/socio') }}" class="nav-link"><i class="fas fa-handshake text-info"></i> Socio</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/formato') }}" class="nav-link"><i class="fas fa-file-video text-info"></i> Formato</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/director') }}" class="nav-link"><i class="fas fa-video text-info"></i> Director</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/genero') }}" class="nav-link"><i class="fas fa-box-open text-info"></i> Genero</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/actor_pelicula') }}" class="nav-link"><i class="fas fa-user-tie text-info"></i> Actor pelicula</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/actor') }}" class="nav-link"><i class="fas fa-user text-info"></i> Actor</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/sexo') }}" class="nav-link"><i class="fas fa-venus-mars text-info"></i> Sexo</a> 
                        </li>
                    </ul>
					@endauth()
					
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
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

        <main class="py-2">
            @yield('content')
        </main>
    </div>
    @livewireScripts
<script type="text/javascript">
	window.livewire.on('closeModal', () => {
		$('#createDataModal').modal('hide');
	});
</script>
</body>
</html>
