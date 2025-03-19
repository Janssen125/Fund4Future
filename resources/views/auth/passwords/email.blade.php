@extends('layouts.auth')
@section('cssName')
    login
@endsection
@section('content')
    <section class="container d-flex justify-content-center align-items-center flex-sm-column">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}" class="d-flex justify-content-center flex-sm-column w-50">
            @csrf
            <div>
                <h1 class="text-center">Reset Password</h1> <br>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary sign-in-btn w-100">Submit</button>
            <hr>
            <div class="container text-center">
                <a href="{{ route('login') }}" class="sign-up">Back to Login Page</a> <br>
            </div>
        </form>
    </section>
@endsection
