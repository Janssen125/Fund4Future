@extends('layouts.user')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="hero">
        <div class="hero-left dvw-100 dvh-100 d-flex justify-content-center position-relative container-color">
            </div>
        <div class="d-flex flex-sm-row align-items-center">
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
            <div class="hero-right w-40 position-absolute end-0 top-15 d-flex justify-content-center align-items-center">
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
                <div class="card" style="width: 23rem;">
                    <img src="{{ asset('img/LogoFund4Future.png') }}" class="card-img-top" alt="..." width=100 height=200 >
                    <div class="card-body p-4">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lksdjf asdfa asd fas asdf asdf  asdfasdf asdf asdf dsaf sdfsadf sadf asdf asdf asd asdfas dfasdf asdf asdfasdf asdfa sdfasdfasdfas dfasd fasdf asdfasdf</p>
                        <h6 class>Raised</h6>
                        <div class="under-card d-flex justify-content-between">
                            <div class="progress w-60">
                                <div class="progress-bar bg-primary-green" role="progressbar" aria-valuenow="70"
                                aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                    50%
                                </div>
                            </div>
                            <div class="readmore-btn">
                                <a class="btn link-secondary-green" href="#" role="button">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" style="width: 23rem;">
                    <img src="{{ asset('img/LogoFund4Future.png') }}" class="card-img-top" alt="..." width=100 height=200 >
                    <div class="card-body p-4">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lksdjf asdfa asd fas asdf asdf  asdfasdf asdf asdf dsaf sdfsadf sadf asdf asdf asd asdfas dfasdf asdf asdfasdf asdfa sdfasdfasdfas dfasd fasdf asdfasdf</p>
                        <h6 class>Raised</h6>
                        <div class="under-card d-flex justify-content-between">
                            <div class="progress w-60">
                                <div class="progress-bar bg-primary-green" role="progressbar" aria-valuenow="70"
                                aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                    50%
                                </div>
                            </div>
                            <div class="readmore-btn">
                                <a class="btn link-secondary-green" href="#" role="button">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" style="width: 23rem">
                    <img src="{{ asset('img/LogoFund4Future.png') }}" class="card-img-top" alt="..." width=100 height=200 >
                    <div class="card-body p-4">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lksdjf asdfa asd fas asdf asdf  asdfasdf asdf asdf dsaf sdfsadf sadf asdf asdf asd asdfas dfasdf asdf asdfasdf asdfa sdfasdfasdfas dfasd fasdf asdfasdf</p>
                        <h5 class>Raised</h5>
                        <div class="under-card d-flex justify-content-between">
                            <div class="progress w-60">
                                <div class="progress-bar bg-primary-green" role="progressbar" aria-valuenow="70"
                                aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                    50%
                                </div>
                            </div>
                            <div class="readmore-btn">
                                <a class="btn link-secondary-green" href="#" role="button">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container our-recommendation">
        <div class="container">
            <p>Our Recommendation</p>
        </div>
        <div class="container grid-container">
            <div class="card">
                <img src="{{ asset('img/LogoFund4Future.png') }}" class="card-img-top" alt="..." width=100 height=200 >
                <div class="card-body p-4">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lksdjf asdfa asd fas asdf asdf  asdfasdf asdf asdf dsaf sdfsadf sadf asdf asdf asd asdfas dfasdf asdf asdfasdf asdfa sdfasdfasdfas dfasd fasdf asdfasdf</p>
                    <h5 class>Raised</h5>
                    <div class="under-card d-flex justify-content-between">
                        <div class="progress w-60">
                            <div class="progress-bar bg-primary-green" role="progressbar" aria-valuenow="70"
                            aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                50%
                            </div>
                        </div>
                        <div class="readmore-btn">
                            <a class="btn link-secondary-green" href="#" role="button">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('img/LogoFund4Future.png') }}" class="card-img-top" alt="..." width=100 height=200 >
                <div class="card-body p-4">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lksdjf asdfa asd fas asdf asdf  asdfasdf asdf asdf dsaf sdfsadf sadf asdf asdf asd asdfas dfasdf asdf asdfasdf asdfa sdfasdfasdfas dfasd fasdf asdfasdf</p>
                    <h5 class>Raised</h5>
                    <div class="under-card d-flex justify-content-between">
                        <div class="progress w-60">
                            <div class="progress-bar bg-primary-green" role="progressbar" aria-valuenow="70"
                            aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                50%
                            </div>
                        </div>
                        <div class="readmore-btn">
                            <a class="btn link-secondary-green" href="#" role="button">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('img/LogoFund4Future.png') }}" class="card-img-top" alt="..." width=100 height=200 >
                <div class="card-body p-4">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lksdjf asdfa asd fas asdf asdf  asdfasdf asdf asdf dsaf sdfsadf sadf asdf asdf asd asdfas dfasdf asdf asdfasdf asdfa sdfasdfasdfas dfasd fasdf asdfasdf</p>
                    <h5 class>Raised</h5>
                    <div class="under-card d-flex justify-content-between">
                        <div class="progress w-60">
                            <div class="progress-bar bg-primary-green" role="progressbar" aria-valuenow="70"
                            aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                50%
                            </div>
                        </div>
                        <div class="readmore-btn">
                            <a class="btn link-secondary-green" href="#" role="button">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('img/LogoFund4Future.png') }}" class="card-img-top" alt="..." width=100 height=200 >
                <div class="card-body p-4">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lksdjf asdfa asd fas asdf asdf  asdfasdf asdf asdf dsaf sdfsadf sadf asdf asdf asd asdfas dfasdf asdf asdfasdf asdfa sdfasdfasdfas dfasd fasdf asdfasdf</p>
                    <h5 class>Raised</h5>
                    <div class="under-card d-flex justify-content-between">
                        <div class="progress w-60">
                            <div class="progress-bar bg-primary-green" role="progressbar" aria-valuenow="70"
                            aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                50%
                            </div>
                        </div>
                        <div class="readmore-btn">
                            <a class="btn link-secondary-green" href="#" role="button">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="container">
            <button>View More</button>
        </div>
    </section>
@endsection

