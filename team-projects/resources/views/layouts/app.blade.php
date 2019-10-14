<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    @section('styles')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stop
    @yield('styles')		

   <style> //Basic styling for background colours and fonts    
	.navbar-brand{
            background-color:#990000;
        }
	.collapse navbar-collapse{
            background-color:#1d643b;
        }
        .navbar-nav ml-auto{
            background-color: #9561e2;
        }
       .nav-item{
            background-color:#990000;
	    font-family: helvetica, Times; color: #ffffff;
	    font-color: #ffffff;	
        }
        .app{
            background-color:#990000;
        }
	.collapse navbar-collapse{
            background-color:#990000;
        }
	body{
            background-color:#f2f2f2;
        }
        .navbar-brand{
            font-style: italic;
            font-weight: bold;
            font-family: Franklin Gothic Medium Cond, Times;
        }
        .py-4{
            background-color:#f2f2f2;
        }
        .container{
            background-color:#f2f2f2;
        }
	a:link {
  		color: white;
	}
	.btn btn-primary{
            padding: 14px 20px;
            margin: 8px 0;
            cursor: pointer;
            width: 100%;
            font-family: helvetica, Times; color: ivory;
            font-size: 14px;
            background-color: #bfbfbf;
            border-radius: 4px;
        }

    </style>	

</head>
<body bgcolor="#f2f2f2">
    <div id="app">
        <nav class="navbar navbar-expand-md" style="background-color: #990000">
            <div class="container" style="background-color: #990000">
                <a class="navbar-brand" style="color:#ffffff" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a style="color: #ffffff" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Helpdesk\Person::find(Auth::user()->username)->first_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
