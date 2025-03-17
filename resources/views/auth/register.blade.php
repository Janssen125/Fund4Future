@extends('layouts.auth')

@section('cssName')
    login
@endsection

@section('content')
    <section class="container d-flex justify-content-center align-center">
        <form method="POST" action="{{ route('register') }}" class="d-flex justify-content-center flex-sm-column w-50">
            <div>
                <h1 class="text-center">Registration</h1> <br>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="dob" id="dob">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary sign-in-btn w-100">Sign Up</button>
            <hr>
            <div class="container text-center">
                <p>Already have an account?</p>
                <a href="{{ route('login') }}" class="sign-up">Sign In</a> <br>
            </div>
        </form>
    </section>
@endsection
