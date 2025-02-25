<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<!-- Navbar Section -->
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid mx-4">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/LogoFund4Future.png') }}" alt="Bootstrap" width="50" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Donation List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
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
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col col-3 d-flex justify-content-center flex-sm-column align-items-center">
                <img src="{{ asset('img/LogoFund4Future.png') }}" alt="Logo" width=80 height=100>
                <img src="{{ asset('img/LogoText.png') }}" alt="LogoText" width=250 height=50>
            </div>
            <div class="col col-3">
                <ul class="list-unstyled d-flex justify-content-around flex-sm-column align-items-start h-100">
                    <li>
                        Return Policy
                    </li>
                    <li>
                        Cookies Policy
                    </li>
                    <li>
                        Privacy Policy
                    </li>
                </ul>
            </div>
            <div class="col col-3">
                <ul class="list-unstyled d-flex justify-content-around flex-sm-column align-items-start h-100">
                    <li>
                        <a href="{{ route('home') }}" class="text-decoration-none ">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="text-decoration-none ">About Us</a>
                    </li>
                    <li>
                        <a href="#" class="text-decoration-none ">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="col col-3 d-flex justify-content-center align-items-center">
                Copyright Fund4Future. All Right Reserved
            </div>
        </div>
</footer>

</html>
{{-- Ini buat templatenya user page (tampilannya user) --}}
