<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link
        href="{{ asset('css/' . (View::hasSection('cssName') ? trim(View::yieldContent('cssName')) : 'root') . '.css') }}"
        rel="stylesheet">
</head>

<header class="sticky-top dvw-100">
    <nav class="navbar navbar-expand-lg dvw-100">
        <div class="container-fluid mx-4">
            <div class="left-side d-flex justify-content-start align-items-center w-50 gap-3">
                <div class="burger-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                    </svg>
                </div>
                <form class="d-flex w-100 rounded-2" role="search">
                    <input class="form-control me-2" type="search" placeholder="What would you like to search..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Q</button>
                </form>
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black"
                        class="bi bi-bell-fill" viewBox="0 0 16 16">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="right-side">
            <div class="container">
                <div class="row">
                    <div class="col">
                        Welcome, {{ Auth::user()->name }}
                    </div>
                    <div class="col">
                        <img class="logo" src="{{ asset('img/LogoFund4Future.png') }}" alt="" srcset="">
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <nav class="off-screen-nav">
        <ul>
            <li>
                <div class="link-container">
                    <a href="">Dashboard</a>
                </div>
            </li>
            <li>
                <div class="link-container">
                    <a href="">Ticketing System</a>
                </div>
            </li>
            <li>
                <div class="link-container">
                    <a href="">Edit Profile</a>
                </div>
            </li>
            <li>
                <div class="link-container">
                    <a href="{{ route('admin.notification') }}">Notifications</a>
                </div>
            </li>
            <li>
                <div class="link-container">
                    <a href="">Mail</a>
                </div>
            </li>
            <li>
                <div class="link-container">
                    <a href="{{ route('admin.activity') }}">Activity Log</a>
                </div>
            </li>
            <li>
                <div class="link-container">
                    <a href="">Settings</a>
                </div>
            </li>
        </ul>
    </nav>
</header>

<body>
    @yield('content')
</body>
<script src="{{ asset('js/' . (View::hasSection('jsName') ? trim(View::yieldContent('jsName')) : '') . '.js') }}">
</script>
</html>
{{-- Ini buat templatenya administrator page (tampilannya staff dan admin) --}}
