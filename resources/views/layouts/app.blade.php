<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Icon only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @yield('head')

</head>

<!-- CSS Files -->
<!-- <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/azzara.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/azzara.min.css') }}">
{{-- icons --}}
<link rel="stylesheet" href="{{ asset('/assets/css/fonts.css') }}">
<script src="{{ asset('/assets/js/plugin/webfont/webfont.min.js') }}"></script> -->
</head>

<body>
    <div id="app">
        @if(session('token'))
            <nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: #242F40">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        Sales Inventory
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        {{-- start ul navbar --}}
                        <ul class="navbar-nav me-auto m-2 mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('home') }}">
                                    <i class='bx bx-home-alt me-1'></i>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('item.index') }}">
                                    <i class='bx bx-user me-1'></i>Items</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('sale.index') }}">
                                    <i class='bx bx-category-alt me-1'></i>Sales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.index') }}"><i class='bx bx-microphone me-1'></i>Customers</a>
                            </li>

                        </ul>
                        {{-- end ul navbar --}}

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav">

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ App\Helper\Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>{{ __('Logout') }}</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        @endif

        <main>
            @yield('content')
        </main>

    </div>

</body>

</html>
