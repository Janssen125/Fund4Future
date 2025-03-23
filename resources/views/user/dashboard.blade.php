@extends('layouts.user')
@section('title')
    Dashboard
@endsection
@section('cssName')
    user-dashboard
@endsection
@section('content')
    <section class="hero container-color flex-sm-column w-100">
        <div class="d-flex flex-sm-row align-items-center dvh-100 w-100 justify-content-around hero-left">
            <div class="big-hero-left d-flex justify-content-center flex-sm-column p-3">
                <div class="p-container">
                    <p class="small-p">#1 fundraiser for technology</p>
                </div>
                <div class="h1-container text-wrap">
                    <h1 class="lh-sm fw-semibold header-f">Fund Inovative Future <br> Projects With Us
                    </h1> <br>
                </div>
                <div class="button-container">
                    <a href=""><button type="button" class="btn btn-success btn-color-primary">Start
                            Funding</button></a>
                </div>
            </div>
            <div class="hero-right d-flex justify-content-center align-items-center">
                <div class="big-hero-right">
                    <img src="{{ asset('img/finance-pic.png') }}" width="500" height="500">
                </div>
            </div>
        </div>
    </section>
    <section class="recommended-projects">
        <div class="container recommended-container p-5">
            <div class="h-container-1 d-flex justify-content-center">
                <h4 class="pb-3">Discover Ongoing Progress</h4>
            </div>
            <div class="card-container d-flex justify-content-around">
                <div class="card m-1">
                    <img src="{{ asset('img/LogoFund4Future.png') }}" class="card-img-top" alt="..." width=100
                        height=200>
                    <div class="card-body p-4">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lksdjf asdfa asd fas asdf asdf
                            asdfasdf asdf asdf dsaf sdfsadf sadf asdf asdf asd asdfas dfasdf asdf asdfasdf asdfa
                            sdfasdfasdfas dfasd fasdf asdfasdf</p>
                        <h6 class>Raised</h6>
                        <div class="under-card d-flex justify-content-between">
                            <div class="progress w-60">
                                <div class="progress-bar bg-primary-green" role="progressbar" aria-valuenow="70"
                                    aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                    50%
                                </div>
                            </div>
                            <div class="readmore-btn">
                                <a class="btn btn-success btn-color-primary" href="#" role="button">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-1">
                    <img src="{{ asset('img/LogoFund4Future.png') }}" class="card-img-top" alt="..." width=100
                        height=200>
                    <div class="card-body p-4">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lksdjf asdfa asd fas asdf asdf
                            asdfasdf asdf asdf dsaf sdfsadf sadf asdf asdf asd asdfas dfasdf asdf asdfasdf asdfa
                            sdfasdfasdfas dfasd fasdf asdfasdf</p>
                        <h6 class>Raised</h6>
                        <div class="under-card d-flex justify-content-between">
                            <div class="progress w-60">
                                <div class="progress-bar bg-primary-green" role="progressbar" aria-valuenow="70"
                                    aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                    50%
                                </div>
                            </div>
                            <div class="readmore-btn">
                                <a class="btn btn-success btn-color-primary" href="#" role="button">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-1">
                    <img src="{{ asset('img/LogoFund4Future.png') }}" class="card-img-top" alt="..." width=100
                        height=200>
                    <div class="card-body p-4">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lksdjf asdfa asd fas asdf asdf
                            asdfasdf asdf asdf dsaf sdfsadf sadf asdf asdf asd asdfas dfasdf asdf asdfasdf asdfa
                            sdfasdfasdfas dfasd fasdf asdfasdf</p>
                        <h5 class>Raised</h5>
                        <div class="under-card d-flex justify-content-between">
                            <div class="progress w-60">
                                <div class="progress-bar bg-primary-green" role="progressbar" aria-valuenow="70"
                                    aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                    50%
                                </div>
                            </div>
                            <div class="readmore-btn">
                                <a class="btn btn-success btn-color-primary" href="#" role="button">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container our-recommendation">
        <div class="container d-flex justify-content-center">
            <h4>Our Recommendation</h4>
        </div>
        <div class="container grid-container p-3">
            <div class="card m-1">
                <img src="{{ asset('img/LogoFund4Future.png') }}" class="card-img-top" alt="..." width=100 height=200>
                <div class="card-body p-4">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lksdjf asdfa asd fas asdf asdf
                        asdfasdf asdf asdf dsaf sdfsadf sadf asdf asdf asd asdfas dfasdf asdf asdfasdf asdfa sdfasdfasdfas
                        dfasd fasdf asdfasdf</p>
                    <h5 class>Raised</h5>
                    <div class="under-card d-flex justify-content-between">
                        <div class="progress w-60">
                            <div class="progress-bar bg-primary-green" role="progressbar" aria-valuenow="70"
                                aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                50%
                            </div>
                        </div>
                        <div class="readmore-btn">
                            <a class="btn btn-success btn-color-primary" href="#" role="button">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-1">
                <img src="{{ asset('img/LogoFund4Future.png') }}" class="card-img-top" alt="..." width=100
                    height=200>
                <div class="card-body p-4">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lksdjf asdfa asd fas asdf asdf
                        asdfasdf asdf asdf dsaf sdfsadf sadf asdf asdf asd asdfas dfasdf asdf asdfasdf asdfa sdfasdfasdfas
                        dfasd fasdf asdfasdf</p>
                    <h5 class>Raised</h5>
                    <div class="under-card d-flex justify-content-between">
                        <div class="progress w-60">
                            <div class="progress-bar bg-primary-green" role="progressbar" aria-valuenow="70"
                                aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                50%
                            </div>
                        </div>
                        <div class="readmore-btn">
                            <a class="btn btn-success btn-color-primary" href="#" role="button">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-1">
                <img src="{{ asset('img/LogoFund4Future.png') }}" class="card-img-top" alt="..." width=100
                    height=200>
                <div class="card-body p-4">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lksdjf asdfa asd fas asdf asdf
                        asdfasdf asdf asdf dsaf sdfsadf sadf asdf asdf asd asdfas dfasdf asdf asdfasdf asdfa sdfasdfasdfas
                        dfasd fasdf asdfasdf</p>
                    <h5 class>Raised</h5>
                    <div class="under-card d-flex justify-content-between">
                        <div class="progress w-60">
                            <div class="progress-bar bg-primary-green" role="progressbar" aria-valuenow="70"
                                aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                50%
                            </div>
                        </div>
                        <div class="readmore-btn">
                            <a class="btn btn-success btn-color-primary" href="#" role="button">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-1">
                <img src="{{ asset('img/LogoFund4Future.png') }}" class="card-img-top" alt="..." width=100
                    height=200>
                <div class="card-body p-4">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lksdjf asdfa asd fas asdf asdf
                        asdfasdf asdf asdf dsaf sdfsadf sadf asdf asdf asd asdfas dfasdf asdf asdfasdf asdfa sdfasdfasdfas
                        dfasd fasdf asdfasdf</p>
                    <h5 class>Raised</h5>
                    <div class="under-card d-flex justify-content-between">
                        <div class="progress w-60">
                            <div class="progress-bar bg-primary-green" role="progressbar" aria-valuenow="70"
                                aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                50%
                            </div>
                        </div>
                        <div class="readmore-btn">
                            <a class="btn btn-success btn-color-primary" href="#" role="button">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="button-container d-flex justify-content-center p-5">
            <a href=""><button type="button" class="btn btn-success btn-color-primary">View More</button></a>
        </div>
    </section>
    <section class="our-goals container d-flex justify-content-center align-center flex-column p-5">
        <div class="header-container d-flex justify-content-center">
            <h4 class="fw-bold text-primary-color">Our Goals</h4>
        </div>
        <div class="p-container">
            <p class="text-center">Fund4Future is a crowdfunding platform designed to support individuals and small
                businesses in bringing their businesses or projects to life.</p>
            <br>
            <p class="text-center">Beyond financial assistance, Fund4Future also helps in achieving Sustainable Development
                Goals (SDGs), particularly SDG 1(No poverty), SDG 8 (Decent Work and Economic Growth), and SDG 9 (Industry,
                Innovation, and Infrastructure). By fostering research, innovation, and entrepreneurship, the platform helps
                bridge the gap between ambition and execution, ensuring that creative individuals and small business
                entrepreneur can thrive while also helping people avoid poverty by creating job opportunity and economic
                growth.</p>
        </div>
    </section>
@endsection
