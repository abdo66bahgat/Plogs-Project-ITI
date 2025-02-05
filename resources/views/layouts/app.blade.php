<!doctype html> 
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 
<head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <!-- CSRF Token --> 
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
 
    <title>{{ config('app.name', 'Bahgoot Blogs') }}</title> 
 
    <!-- Fonts --> 
    <link rel="dns-prefetch" href="//fonts.bunny.net"> 
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> 
 
    <!-- Custom Styles -->
    <style>
        .navbar-custom {
            background-color: #d4e9e2 !important; /* Soft pastel green */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Light shadow */
            padding: 10px 15px; /* More comfortable spacing */
        }
        .content-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 90%;
            margin: 20px auto;
        }
    </style>

    <!-- Scripts --> 
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) 
</head> 
<body> 
    <div id="app"> 
        <nav class="navbar navbar-custom">  
            <div class="container"> 
                <a class="navbar-brand" href="{{ url('/') }}"> 
                    {{ config('app.name', '') }} 
                </a> 
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}"> 
                    <span class="navbar-toggler-icon"></span> 
                </button> 
 
                <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
                        <li class="nav-item"> 
                            <a class="nav-link active" href="/posts">All Posts</a> 
                        </li> 
                    </ul> 
                </div> 
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
                    <ul class="navbar-nav ms-auto"> 
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> 
                                    {{ Auth::user()->name }} 
                                </a> 

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"> 
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

        <main class="py-4"> 
        <div class="content-container">
            @yield('content') 
        </main> 
    </div> 
</body> 
</html>
