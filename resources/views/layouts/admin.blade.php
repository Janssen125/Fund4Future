<!DOCTYPE html>
<html lang="en">

@if (auth()->check() && auth()->user()->role == 'user')
    <script>
        window.location.href = "{{ route('home') }}";
    </script>
@endif

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/LogoFund4Future.png') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link
        href="{{ asset('css/' . (View::hasSection('cssName') ? trim(View::yieldContent('cssName')) : 'root') . '.css') }}"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>

<header class="sticky-top dvw-100">
    <nav class="navbar navbar-expand-lg w-100">
        <div class="row w-100 m-1">
            <div class="col col-3 col-l">
                <div class="burger-icon ms-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                    </svg>
                </div>
            </div>
            <div class="col col-9 col-r">
                <div class="row pe-3">
                    <div class="col">
                        <span style="white-space: nowrap;">Welcome, {{ Auth::user()->name }}</span>
                    </div>
                    <div class="col">
                        @if (auth()->user()->userImg == 'AssetAdmin.png' || auth()->user()->userImg == 'AssetUser.png')
                            <img src="{{ asset('img/' . auth()->user()->userImg) }}" alt="Bootstrap" width="45"
                                height="45">
                        @elseif(auth()->user()->userImg == null)
                            <img src="{{ asset('img/AssetUser.png') }}" alt="" width="45" height="45">
                        @else
                            <img src="{{ route('getimage', auth()->user()->userImg) }}" alt="" width="45"
                                height="45">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<body>
    <main>
        <aside class="off-screen-nav">
            <ul>
                <a href="{{ route('admin.index') }}">
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-grid-1x2" viewBox="0 0 16 16">
                            <path
                                d="M6 1H1v14h5zm9 0h-5v5h5zm0 9v5h-5v-5zM0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1zm1 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1z" />
                        </svg>
                        Dashboard
                    </li>
                </a>
                <a href="{{ route('admin.ticketing') }}">
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-ticket-perforated" viewBox="0 0 16 16">
                            <path
                                d="M4 4.85v.9h1v-.9zm7 0v.9h1v-.9zm-7 1.8v.9h1v-.9zm7 0v.9h1v-.9zm-7 1.8v.9h1v-.9zm7 0v.9h1v-.9zm-7 1.8v.9h1v-.9zm7 0v.9h1v-.9z" />
                            <path
                                d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3zM1 4.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v1.05a2.5 2.5 0 0 0 0 4.9v1.05a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-1.05a2.5 2.5 0 0 0 0-4.9z" />
                        </svg>
                        Ticketing System
                    </li>
                </a>
                @if (auth()->user()->role == 'admin')
                    <a href="{{ route('user.index') }}">
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                            </svg>
                            User List
                        </li>
                    </a>
                @endif
                <a href="{{ route('admin.notification') }}">
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-bell" viewBox="0 0 16 16">
                            <path
                                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                        </svg>
                        Notifications
                    </li>
                </a>
                <a href="{{ route('category.index') }}">
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-tag" viewBox="0 0 16 16">
                            <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0" />
                            <path
                                d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1m0 5.586 7 7L13.586 9l-7-7H2z" />
                        </svg>
                        Category
                    </li>
                </a>
                <a href="{{ route('mail.index') }}">
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-envelope" viewBox="0 0 16 16">
                            <path
                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                        </svg>
                        Mail
                    </li>
                </a>
                @if (auth()->user()->role == 'admin')
                    <a href="{{ route('admin.activity') }}">
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-activity" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2" />
                            </svg>
                            Activity Log
                        </li>
                    </a>
                @endif
                <a href="{{ route('logout') }}">
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                            <path fill-rule="evenodd"
                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                        </svg>
                        Logout
                    </li>
                </a>
            </ul>
        </aside>
        <section>
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
            <footer>
                @Copyright 2025 Fund4Future
                @if (session('message'))
                    {{ session('message') }}
                @endif
            </footer>
        </section>
    </main>
</body>
<script src="{{ asset('js/admin/navbar.js') }}"></script>
<script src="{{ asset('js/' . (View::hasSection('jsName') ? trim(View::yieldContent('jsName')) : '') . '.js') }}">
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
{{-- Ini buat templatenya administrator page (tampilannya staff dan admin) --}}
