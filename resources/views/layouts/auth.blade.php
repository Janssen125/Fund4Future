<!DOCTYPE html>
<html lang="en" class="primary-background">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link
        href="{{ asset('css/' . (View::hasSection('cssName') ? trim(View::yieldContent('cssName')) : 'root') . '.css') }}"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
</head>

<body class="bg-white w-50">
    @yield('content')
</body>

</html>
{{-- Template Header Dan Footer Login Register --}}
