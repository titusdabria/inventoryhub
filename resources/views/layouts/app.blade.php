<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $page_title ?? 'InventoryHUB' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="{{ session('theme', 'dark-mode') }}">
    <div class="d-flex" style="min-height: 100vh;">
        {{-- Sidebar --}}
        @include('partials.sidebar')

        {{-- Main content --}}
        <div class="flex-grow-1 d-flex flex-column">
            @include('partials.header')
            <main class="p-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
