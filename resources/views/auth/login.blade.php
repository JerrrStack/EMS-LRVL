@extends('layouts.app')

@section('body-class', 'page-auth')

@section('content')
<div class="login-page">
    <section class="login-brand" aria-hidden="true">
        <div class="login-brand-inner">
            <div class="login-brand-logo">
                <img src="{{ asset('assets/img/favicon.svg') }}" alt="" width="56" height="56">
                <span>EMS</span>
            </div>
            <h1 class="login-brand-title">Employee Management System</h1>
            <p class="login-brand-text">
                A streamlined platform to manage employees, departments, and user access in one place.
            </p>
            <ul class="login-features">
                <li>Employee CRUD &amp; search</li>
                <li>Role-based authentication</li>
                <li>Department organization</li>
                <li>Secure session management</li>
            </ul>
            <p class="login-stack">Laravel 10 · PHP 8.2 · MySQL</p>
        </div>
        <div class="login-brand-shape login-brand-shape--1"></div>
        <div class="login-brand-shape login-brand-shape--2"></div>
    </section>

    <section class="login-form-panel">
        <div class="login-card">
            <div class="login-card-header">
                <h2 class="login-card-title">Welcome back</h2>
                <p class="login-card-subtitle">Sign in to access your dashboard</p>
            </div>

            @if ($errors->any())
                <div class="form-alert">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('/login') }}" method="post" class="login-form">
                @csrf
                <div class="form-group">
                    <label for="login-email">Email</label>
                    <input
                        type="email"
                        name="email"
                        id="login-email"
                        placeholder="you@company.com"
                        value="{{ old('email', 'first.user@gmail.com') }}"
                        autocomplete="email"
                    >
                </div>
                <div class="form-group">
                    <label for="login-password">Password</label>
                    <div class="password-wrap">
                        <input
                            type="password"
                            name="password"
                            id="login-password"
                            placeholder="Enter your password"
                            value="{{ old('password', 'test') }}"
                            autocomplete="current-password"
                        >
                        <button type="button" class="password-toggle" aria-label="Show password" title="Show password">
                            <span class="password-toggle-icon" aria-hidden="true">&#128065;</span>
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn-login">Sign in</button>
            </form>

            <p class="login-demo-hint">
                Demo credentials are pre-filled for quick testing.
            </p>

            <p class="auth-switch">
                Don't have an account? <a href="{{ route('register') }}">Create one</a>
            </p>
        </div>
    </section>
</div>
@endsection
