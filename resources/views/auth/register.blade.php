@extends('layouts.auth')

@section('cssName')
    login
@endsection

@section('content')
    <section class="container d-flex justify-content-center align-center">
        <form method="POST" action="{{ route('user.store') }}" class="d-flex justify-content-center flex-sm-column w-50">
            @csrf
            <div>
                <h1 class="text-center">Registration</h1> <br>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                    id="username" value="{{ old('username') }}">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    id="email" value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nohp" class="form-label">Phone Number</label>
                <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" id="nohp"
                    value="{{ old('nohp') }}">
                @error('nohp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jk" class="form-label">Jenis Kelamin</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('jk') is-invalid @enderror" type="radio" name="jk"
                            id="pria" value="pria" {{ old('jk') == 'pria' ? 'checked' : '' }}>
                        <label class="form-check-label" for="pria">Pria</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('jk') is-invalid @enderror" type="radio" name="jk"
                            id="wanita" value="wanita" {{ old('jk') == 'wanita' ? 'checked' : '' }}>
                        <label class="form-check-label" for="wanita">Wanita</label>
                    </div>
                    @error('jk')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
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
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" id="dob"
                    value="{{ old('dob') }}">
                @error('dob')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
