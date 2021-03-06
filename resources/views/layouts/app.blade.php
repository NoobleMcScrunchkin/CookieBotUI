<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bot') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/3bcb40cd24.js" crossorigin="anonymous"></script>
    <script src="https://cdn.socket.io/4.4.1/socket.io.min.js"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-zinc-300 dark:bg-zinc-700 text-zinc-900 dark:text-zinc-100">
        <div class="flex flex-row min-h-screen">
            @include('layouts.sidebar')
            <main class="grow overflow-x-hidden overflow-y-auto">
                <!-- Page Content -->
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
