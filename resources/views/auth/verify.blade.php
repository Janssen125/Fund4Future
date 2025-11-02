@extends('layouts.auth')


@section('title')
    Verify Email
@endsection
@section('cssName')
    login
@endsection

@section('content')
    <section class="container">
        <form method="GET" action="{{ route('resend.verification.email', Auth::id()) }}">
            @csrf
            <h2 class="text-center">Resend Verification Email</h2>
            <div class="p-3">
                Verification email sent to <b>{{ Auth::user()->email }}</b>.
            </div>
            @if (session('message'))
                <div class="alert alert-success w-100 text-success">
                    {{ session('message') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger w-100 text-danger">
                    {{ session('error') }}
                </div>
            @endif
            <button type="submit"
                class="btn btn-primary sign-in-btn w-100">{{ __('click here to request another') }}</button>
        </form>
    </section>
@endsection
