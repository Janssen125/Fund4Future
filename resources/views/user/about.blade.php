@extends('layouts.user')
@section('title')
    About Us
@endsection
@section('content')
    <section class="dvw-100 position-relative d-flex justify-content-center align-items-center">
        <div class="dvw-100 position-absolute top-0 start-0 z-n1">
            <img src="{{ asset('img/BgImgAboutUs.jpg') }}" alt="Background" srcset="" class="section-background-size">
        </div>
        <div class="p-5 bg-container-transparent">
            <div class="container">
                <div class="row">
                    <h1>About Us</h1>
                    <div class="col flex-column d-flex justify-content-around">
                        <p>
                        FundFuture is an online crowdfunding platform 
                        that helps individuals and communities bring 
                        creative projects—such as events, films, and 
                        other initiatives—to life, even when facing financial 
                        constraints. We provide a transparent, accessible, and secure 
                        solution to connect creators with enthusiastic supporters.
                        </p>
                        <span style="border: 1px solid #000; border-radius: 10px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col flex-column d-flex justify-content-around" style="align-items: flex-start;">
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
                                    <div class="col flex-column d-flex justify-content-around" style="border: 20px solid #FFFFFF; border-radius: 10px;">
                                        <img src="{{ asset('img/BgImgAboutUs2.jpg') }}" alt="FundFuture presentation with audience" style="width: 200px;">
                                    </div>
                                </div>
                            </div>
                        </span>
                        <br>
                        <span style="border: 1px solid #000; border-radius: 10px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col flex-column d-flex justify-content-around" style="border: 20px solid #FFFFFF; border-radius: 10px;">
                                        <img src="{{ asset('img/BgImgAboutUs3.jpg') }}" alt="FundFuture presentation with audience" style="width: 200px;">
                                    </div>
                                    <div class="col flex-column d-flex justify-content-around" style="align-items: flex-start;">
                                        <h1 class="title">Latar Belakang</h1>
                                        <p>
                                        FundFuture is an online crowdfunding platform 
                                        that helps individuals and communities bring 
                                        creative projects—such as events, films, and 
                                        other initiatives—to life, even when facing 
                                        financial constraints. We provide a transparent, 
                                        accessible, and secure solution to connect 
                                        creators with enthusiastic supporters.                                             to connect creators with enthusiastic supporters.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </span>
                        <br>
                        <span style="border: 1px solid #000; border-radius: 10px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col flex-column d-flex justify-content-around" style="align-items: center;">
                                        <h1 class="title">Company History</h1>
                                        <br>
                                        <p>
                                        Fund4Future didirikan pada tahun 2025 
                                        dengan tujuan utama membantu individu 
                                        dan komunitas merealisasikan proyek 
                                        kreatif mereka, seperti acara, film, 
                                        dan inisiatif sosial lainnya, meskipun 
                                        menghadapi keterbatasan finansial.                                            to connect creators with enthusiastic supporters.
                                        </p>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </span>
                        <br>
                        <section class="team-section" style="background-color: #d1f3f5; padding: 50px 0; text-align: center;">
                            <h2 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 40px;">Our Team</h2>

                            <div class="team-container" style="display: flex; justify-content: center; flex-wrap: wrap; gap: 30px;">
                            <!-- Member 1 -->
                            <div class="team-member" style="width: 150px;">
                                <div class="circle" style="width: 120px; height: 120px; border: 2px solid black; border-radius: 50%; margin: 0 auto 10px;"></div>
                                <h4 style="margin: 10px 0 5px;">Abraham</h4>
                                <p>FrontEnd</p>
                            </div>

                            <!-- Member 2 -->
                            <div class="team-member" style="width: 150px;">
                                <div class="circle" style="width: 120px; height: 120px; border: 2px solid black; border-radius: 50%; margin: 0 auto 10px;"></div>
                                <h4 style="margin: 10px 0 5px;">Melvin</h4>
                                <p>UI/X Design<br>Front End</p>
                            </div>

                            <!-- Member 3 (CEO) -->
                            <div class="team-member" style="width: 150px;">
                                <div class="circle" style="width: 120px; height: 120px; border: 2px solid black; border-radius: 50%; margin: 0 auto 10px;"></div>
                                <h4 style="margin: 10px 0 5px;">Jonson Edition</h4>
                                <p>CEO<br>Fullstack</p>
                            </div>

                            <!-- Member 4 -->
                            <div class="team-member" style="width: 150px;">
                                <div class="circle" style="width: 120px; height: 120px; border: 2px solid black; border-radius: 50%; margin: 0 auto 10px;"></div>
                                <h4 style="margin: 10px 0 5px;">Komang</h4>
                                <p>UI/X Design</p>
                            </div>

                            <!-- Member 5 -->
                            <div class="team-member" style="width: 150px;">
                                <div class="circle" style="width: 120px; height: 120px; border: 2px solid black; border-radius: 50%; margin: 0 auto 10px;"></div>
                                <h4 style="margin: 10px 0 5px;">Anricco</h4>
                                <p>UI/X Design</p>
                            </div>
                        </div>
                    </section>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
{{-- Halaman untuk About us user, pengenalan aplikasi kita --}}
