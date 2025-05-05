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
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.update') }}" class="d-flex justify-content-center flex-sm-column w-50">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <div>
                <h1 class="text-center">Reset Password</h1> <br>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" id="email"
                    value="{{ old('email', request()->email) }}" readonly>

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary sign-in-btn w-100">Change Password</button>
        </form>
    </section>
@endsection
