@extends('layouts.app')

@section('content')
<div class="page-center">
    <div class="container">
        <h1 class="page-title">Login</h1>

        @if ($errors->any())
            <div class="form-alert">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ url('/login') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <div class="password-wrap">
                    <input type="password" name="password" id="login-password" placeholder="Password">
                    <button type="button" class="password-toggle" aria-label="Show password" title="Show password">
                        <span class="password-toggle-icon" aria-hidden="true">&#128065;</span>
                    </button>
                </div>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</div>
@endsection
