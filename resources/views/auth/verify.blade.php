@extends('layouts.auth')


@section('title')
    Verify Email
@endsection
@section('cssName')
    login
@endsection

@section('content')
    <section class="container d-flex justify-content-center align-items-center">
        <form class="d-flex justify-content-center flex-sm-column align-items-center" method="POST"
            action="{{ route('verification.resend') }}">
            @csrf
            <h2 class="text-center">Resend Verification Email</h2>
            <div class="p-3">
                Verification email sent to <b>{{ Auth::user()->email }}</b>.
            </div>
            @if (session('message'))
                <div class="alert alert-success w-100 text-success">
                    {{ session('message') }}
                </div>
            @endif
            <button type="submit"
                class="btn btn-primary sign-in-btn w-100">{{ __('click here to request another') }}</button>
        </form>
    </section>
@endsection
