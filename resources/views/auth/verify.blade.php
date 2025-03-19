@extends('layouts.auth')

@section('cssName')
    login
@endsection

@section('content')
    <section class="container d-flex justify-content-center align-center">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <form class="d-flex justify-content-center flex-sm-column w-50" method="POST"
            action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit"
                class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
        </form>
    </section>
@endsection
