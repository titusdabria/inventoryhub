<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'InventoryHUB')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="{{ session('theme', 'dark-mode') }}">

    <div class="d-flex" style="min-height: 100vh;">
        
        <!-- Sidebar -->
        <nav class="bg-dark text-white p-4 d-flex flex-column justify-content-between" style="width: 250px;">
            <div>
                 <!-- User Info Card -->
                 <div class="card bg-secondary text-white mb-4">
                    <div class="text-center mt-4">
                        <img src="https://ui-avatars.com/api/?name=Titus+Dabria" class="rounded-circle mb-2" width="48" height="48" alt="Avatar">
                    </div>
                    <div class="card-body p-3">
                        <h6 class="card-title mb-1">Titus Dabria</h6>
                        <small class="text-light">Admin</small>
                    </div>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active fw-bold' : '' }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('products') }}" class="nav-link text-white {{ request()->routeIs('products') ? 'active fw-bold' : '' }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('orders') }}" class="nav-link text-white {{ request()->routeIs('orders') ? 'active fw-bold' : '' }}">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('reports') }}" class="nav-link text-white {{ request()->routeIs('reports') ? 'active fw-bold' : '' }}">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('settings') }}" class="nav-link text-white {{request()->routeIs('settings') ? 'active fw-bold' : ''}}">Settings</a>
                    </li>
                </ul>
            </div>
            <div>
                <a href="#" class="text-danger">Logout</a>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="flex-grow-1 d-flex flex-column">
            
            <!-- Header -->
            <header class="border-bottom p-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-uppercase">{{ $page_title ?? 'InventoryHUB' }}</h5>
                <span class="fw-semibold">InventoryHUB</span>
            </header>

            <!-- Page Content -->
            <main class="p-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>
