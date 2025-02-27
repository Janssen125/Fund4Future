@extends('layouts.user')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="dvh-100 d-flex flex-sm-row w-100 align-items-center">
        <div class="hero-left w-60 dvh-100 d-flex justify-content-center position-relative container-color">
        </div>
        <div
            class="big-hero-left position-absolute start-10 top-0 dvh-100 w-60 d-flex justify-content-center flex-sm-column">
            <div class="p-container">
                <p class="small-p">#1 fundraiser for technology</p>
            </div>
            <div class="h1-container text-wrap">
                <h1 class="lh-sm fw-semibold header-f">Fund Inovative Future <br> Projects With Us</h1>
            </div>
            <div class="button-container">
                <button type="button" class="btn btn-success primary-background">Start Funding</button>
            </div>
        </div>
        <div class="hero-right w-40 d-flex justify-content-center align-items-center">
            <div class="big-hero-right">
                <img src="{{ asset('img/LogoFund4Future.png') }}" alt="Gambar">
                {{-- Ini sementara dulu ya, nanti gambarnya diubah --}}
            </div>
        </div>
    </div>
@endsection
{{-- Halaman untuk landing page user --}}
