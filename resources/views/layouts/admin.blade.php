<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <link
        href="{{ asset('css/' . (View::hasSection('cssName') ? trim(View::yieldContent('cssName')) : 'root') . '.css') }}"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<!-- <header>
<nav class="navbar">
    <div class="container">
        <div class="row">
            <div class="col">
                <form class="d-flex border border-success rounded-2" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Q</button>
                </form>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-bell-fill" viewBox="0 0 16 16">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
                    </svg>         
                </div>
            </div>
        </div>
    </nav>
</header> -->
<!-- Navbar Section -->
<header class="sticky-top dvw-100">
    <nav class="navbar navbar-expand-lg bg-body-tertiary dvw-100">
        <div class="container-fluid mx-4">
            <div class="left-side d-flex justify-content-start align-items-center">
                <div class="thepic">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('img/LogoFund4Future.png') }}" alt="Bootstrap" width="45" height="50">
                    </a>
                </div>
                @guest
                    Welcome, Guest
                @else
                    <div class="border-start px-3 d-flex justify-content-start align-items-center">
                        <span class="cooltypinganimation">Hello {{ Auth::user()->name }}!</span>
                    </div>
                @endguest
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fund.index') }}">Funding List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                    </li>
                </ul>
                <div id="navbarButton">
                    @if (Auth::check())
                        <div class="dropdown">
                            <button class="btn btn-outline-success ms-lg-3 dropdown-toggle" type="button"
                                id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile Setting</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                    @if(Auth::user()->role == 'admin')
                                <li><a class="dropdown-item" href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </div>
                    @else
                        <a class="btn btn-outline-success ms-lg-3" href="{{ route('login') }}">Start Funding</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
    <body>
    @yield('content')
</body>

</html>
{{-- Ini buat templatenya administrator page (tampilannya staff dan admin) --}}
