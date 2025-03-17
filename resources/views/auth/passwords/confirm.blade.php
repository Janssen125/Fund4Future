@extends('layouts.auth')
@section('cssName')
    login
@endsection
@section('content')
    <section class="container d-flex justify-content-center align-center">
        <form method="POST" action="{{ route('password.confirm') }}"
            class="d-flex justify-content-center flex-sm-column w-50">
            @csrf
            <div>
                <h1 class="text-center">Confirm Password</h1> <br>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary sign-in-btn w-100">Confirm Password</button>
        </form>
    </section>
@endsection
