@extends('layouts.app')

@section('content')
<div class="page-center">
    <div class="container">
        <h1 class="page-title">Register</h1>

        @if ($errors->any())
            <div class="form-alert">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="full_name" placeholder="Full name" value="{{ old('full_name') }}">
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password">
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
</div>
@endsection
