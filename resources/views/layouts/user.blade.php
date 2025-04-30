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
    <main>
        @yield('content')
        <div id="notification"
            class="toast align-items-center text-white bg-success primary-background position-fixed bottom-0 end-0 m-3 p-3"
            role="alert" aria-live="assertive" aria-atomic="true" style="display: none;">
            <div class="d-flex">
                <div class="toast-body" id="notification-message">
                    @if (session('message'))
                        {{ session('message') }}
                    @endif
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto"
                    onclick="hideNotification()"></button>
            </div>
        </div>
    </main>
</body>

<!-- Footer Section -->
<footer class="p-5 secondary-background w-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-3 bg-white rounded">
                <img src="{{ asset('img/LogoFund4Future.png') }}" alt="Logo" width=80 height=100>
                <img src="{{ asset('img/LogoText.png') }}" alt="LogoText" width=250 height=50>
            </div>
            <div class="col col-9 socialCopy">
                <div class="row w-100">
                    <div class="col">
                        <ul class="list-unstyled d-flex justify-content-evenly w-100">
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
                <div class="row p-3 socialCopy">
                    <div class="col">
                        <a href="#">
                            <img src="{{ asset('img/FacebookPNG.png') }}" alt="Logo" width=40 height=40
                                class="">
                        </a>
                    </div>
                    <div class="col">
                        <a href="#">
                            <img src="{{ asset('img/InstagramPNG.png') }}" alt="Logo" width=40 height=40
                                class="">
                        </a>
                    </div>
                    <div class="col">
                        <a href="#">
                            <img src="{{ asset('img/TwitterPNG.png') }}" alt="Logo" width=40 height=40
                                class="">
                        </a>
                    </div>
                </div>
                <div class="row socialCopy" id="copyright">
                    <div class="col flex d-flex justify-content-center align-items-center text-white">
                        Copyright Fund4Future. All Right Reserved
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('js/' . (View::hasSection('jsName') ? trim(View::yieldContent('jsName')) : '') . '.js') }}">
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            grabCursor: true,
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                576: {
                    slidesPerView: 1,
                },
            },
        });
    });
</script>
<script>
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting && entry.target.classList != "show") {
                entry.target.classList.add("show");
            }
        });
    });

    document.querySelectorAll("div").forEach((el) => observer.observe(el));
</script>
<script>
    function showNotification(message, type = 'success') {
        let notification = document.getElementById('notification');
        let notificationMessage = document.getElementById('notification-message');

        notificationMessage.innerHTML = message;
        notification.classList.remove('bg-success', 'bg-danger', 'bg-warning');
        notification.classList.add(`bg-${type}`);
        notification.style.display = 'block';

        setTimeout(() => {
            hideNotification();
        }, 5000);
    }

    function hideNotification() {
        document.getElementById('notification').style.display = 'none';
    }
</script>
@if (session('message'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            showNotification("{{ session('message') }}", 'primary-background');
        });
    </script>
@endif
@if (session('error'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            showNotification("{{ session('error') }}", 'danger');
        });
    </script>
@endif

</html>
{{-- Ini buat templatenya user page (tampilannya user) --}}
