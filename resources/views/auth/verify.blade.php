@extends('layouts.app')

@section('content')
    <section class="container d-flex justify-content-center align-center">
        <form class="d-flex justify-content-center flex-sm-column w-50" method="POST"
            action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit"
                class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
        </form>
    </section>
@endsection
