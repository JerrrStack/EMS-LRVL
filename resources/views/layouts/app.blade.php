<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2563eb">
    <title>Employee Management System</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/img/favicon.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="@yield('body-class')">

<header class="navbar">
    <a href="{{ auth()->check() ? route('employees.index') : route('login') }}" class="navbar-brand">
        <img src="{{ asset('assets/img/favicon.svg') }}" alt="" width="32" height="32" class="navbar-logo">
        <span>EMS</span>
    </a>

    <nav>
        @auth
            <span>Welcome, {{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" class="inline-form">
                @csrf
                <button type="submit" class="btn-link">Logout</button>
            </form>
        @else
            @unless (request()->routeIs('login'))
                <a href="{{ route('login') }}">Login</a>
            @endunless
            @unless (request()->routeIs('register'))
                <a href="{{ route('register') }}">Register</a>
            @endunless
        @endauth
    </nav>
</header>

<main>
    @if (session('success'))
        <div class="page-alert">
            <div class="alert-success" role="alert">{{ session('success') }}</div>
        </div>
    @endif

    @yield('content')
</main>

<footer>
    <p>&copy; {{ date('Y') }} Employee Management System</p>
</footer>

<script src="{{ asset('assets/js/app.js') }}"></script>

</body>
</html>
