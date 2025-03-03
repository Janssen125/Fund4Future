<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<!-- Navbar Section -->
<header class="fixed-top">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid mx-4">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/LogoFund4Future.png') }}" alt="Bootstrap" width="45" height="50">
            </a>
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
                        <a class="nav-link" href="{{ route('fund.index') }}">Donation List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                    </li>
                </ul>
                <a class="btn btn-outline-success ms-lg-3" href="{{ route('login') }}">Start Funding</a>
            </div>
        </div>
    </nav>
</header>

<body>
    @yield('content')
</body>

<!-- Footer Section -->
<footer class="p-5 primary-background dvw-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-3 d-flex justify-content-center flex-sm-column align-items-center bg-white rounded">
                <img src="{{ asset('img/LogoFund4Future.png') }}" alt="Logo" width=80 height=100>
                <img src="{{ asset('img/LogoText.png') }}" alt="LogoText" width=250 height=50>
            </div>

            <div class="col col-9">
                <div class="row">
                    <div class="col justify-content-center align-items-center d-flex">
                        <ul class="list-unstyled d-flex justify-content-around align-items-start h-100 w-75">
                            <li>
                                <a href="{{ route('home') }}" class="text-decoration-none text-white fs-3">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}" class="text-decoration-none text-white fs-3">About
                                    Us</a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}" class="text-decoration-none text-white fs-3">Contact
                                    Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col d-flex justify-content-evenly align-items-center">
                        <img src="{{ asset('img/LogoFund4Future.png') }}" alt="Logo" width=40 height=40
                            class="bg-white">
                        <img src="{{ asset('img/LogoFund4Future.png') }}" alt="Logo" width=40 height=40
                            class="bg-white">
                        <img src="{{ asset('img/LogoFund4Future.png') }}" alt="Logo" width=40 height=40
                            class="bg-white">
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-center align-items-center text-white">
                        Copyright Fund4Future. All Right Reserved
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

</html>
{{-- Ini buat templatenya user page (tampilannya user) --}}
