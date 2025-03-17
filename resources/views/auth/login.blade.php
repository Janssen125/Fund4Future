@extends('layouts.auth')

@section('cssName')
    login
@endsection

@section('content')
    <section class="container d-flex justify-content-center align-center">
        <form method="POST" action="{{ route('login') }}" class="d-flex justify-content-center flex-sm-column w-50">
            @csrf
            <div>
                <h1 class="text-center">Welcome Back!</h1> <br>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
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
                <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>
            </div>
        </form>
    </section>
@endsection
