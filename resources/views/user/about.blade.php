@extends('layouts.user')
@section('title')
    About Us
@endsection
@section('cssName')
    about
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row p-5">
                <h1>About Us</h1>
                <div class="col">
                    <p>
                        FundFuture is an online crowdfunding platform
                        that helps individuals and communities bring
                        creative projects—such as events, films, and
                        other initiatives—to life, even when facing financial
                        constraints. We provide a transparent, accessible, and secure
                        solution to connect creators with enthusiastic supporters.
                    </p>
                </div>
            </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col col-l">
                    <h1 class="title">Latar Belakang</h1>
                    <p>
                        FundFuture is an online crowdfunding
                        platform that helps individuals and communities
                        bring creative projects—such as events,
                        films, and other initiatives—to life, even
                        when facing financial constraints. We provide
                        a transparent, accessible, and secure solution
                        to connect creators with enthusiastic supporters.
                    </p>
                </div>
                <div class="col">
                    <img src="{{ asset('img/BgImgAboutUs2.jpg') }}" alt="FundFuture presentation with audience">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('img/BgImgAboutUs3.jpg') }}" alt="FundFuture presentation with audience">
                </div>
                <div class="col col-l">
                    <h1 class="title">Latar Belakang</h1>
                    <p>
                        FundFuture is an online crowdfunding platform
                        that helps individuals and communities bring
                        creative projects—such as events, films, and
                        other initiatives—to life, even when facing
                        financial constraints. We provide a transparent,
                        accessible, and secure solution to connect
                        creators with enthusiastic supporters. to connect creators with enthusiastic
                        supporters.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col" style="align-items: center;">
                    <h1 class="title">Company History</h1>
                    <br>
                    <p>
                        Fund4Future didirikan pada tahun 2025
                        dengan tujuan utama membantu individu
                        dan komunitas merealisasikan proyek
                        kreatif mereka, seperti acara, film,
                        dan inisiatif sosial lainnya, meskipun
                        menghadapi keterbatasan finansial. to connect creators with enthusiastic
                        supporters.
                    </p>
                    <br>
                </div>
            </div>
        </div>
    </section>
    <section class="team-section" style="background-color: #d1f3f5; padding: 50px 0; text-align: center;">
        <h2 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 40px;">Our Team</h2>

        <div class="container">
            <div class="row">

                <div class="col">
                    <div class="circle">
                        <img src="{{ asset('img/LogoFund4Future.png') }}" alt="" srcset="">
                    </div>
                    <h4 style="margin: 10px 0 5px;">Abraham</h4>
                    <p>FrontEnd</p>
                </div>

                <div class="col">
                    <div class="circle">
                        <img src="{{ asset('img/LogoFund4Future.png') }}" alt="" srcset="">
                    </div>
                    <h4 style="margin: 10px 0 5px;">Melvin</h4>
                    <p>UI/X Design<br>Front End</p>
                </div>

                <div class="col">
                    <div class="circle">
                        <img src="{{ asset('img/LogoFund4Future.png') }}" alt="" srcset="">
                    </div>
                    <h4 style="margin: 10px 0 5px;">Janssen Addison</h4>
                    <p>CEO<br>Fullstack</p>
                </div>

                <div class="col">
                    <div class="circle">
                        <img src="{{ asset('img/LogoFund4Future.png') }}" alt="" srcset="">
                    </div>
                    <h4 style="margin: 10px 0 5px;">Komang</h4>
                    <p>UI/X Design</p>
                </div>

                <div class="col">
                    <div class="circle">
                        <img src="{{ asset('img/LogoFund4Future.png') }}" alt="" srcset="">
                    </div>
                    <h4 style="margin: 10px 0 5px;">Anricco</h4>
                    <p>UI/X Design</p>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- Halaman untuk About us user, pengenalan aplikasi kita --}}
