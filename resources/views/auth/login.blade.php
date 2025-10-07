@extends('layouts.auth')

@section('title')
    Login
@endsection
@section('cssName')
    login
@endsection

@section('content')
    <section class="container">
        @if (session('message'))
            <div class="alert alert-success w-50 text-success">
                {{ session('message') }}
            </div>
        @elseif (session('status'))
            <div class="alert alert-success w-50 text-success">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <h1 class="text-center">Welcome Back!</h1> <br>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                    value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    id="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary sign-in-btn w-100">Sign In</button>
            <hr>
            <div class="container text-center">
                <p>Dont have an account?</p>
                <a href="{{ route('register') }}" class="sign-up">Sign Up</a> <br>
                <!-- <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a> -->
            </div>
        </form>
    </section>
@endsection
