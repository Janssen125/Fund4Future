@extends('layouts.user')
@section('title')
    Dashboard
@endsection
@section('cssName')
    user-dashboard
@endsection
@section('content')
    <section class="hero container-color flex-sm-column w-100">
        <div class="row dvh-100 w-100 hero-left">
            <div class="col big-hero-left p-5">
                <div class="container p-container ps-5">
                    <div class="row">
                        <div class="col col-l">
                            <p class="small-p">#1 fundraiser for technology</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-l h1-container text-wrap">
                            <h1 class="lh-sm fw-semibold header-f">Fund Inovative Future <br> Projects With Us
                            </h1> <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-l button-container">
                            @if (!auth()->user())
                                <a href="{{ route('login') }}"><button type="button"
                                        class="btn btn-success btn-color-primary">Start
                                        Funding</button></a>
                            @else
                                <a href="{{ route('fund.index') }}"><button type="button"
                                        class="btn btn-success btn-color-primary">Start
                                        Funding</button></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-right col">
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
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($projects as $project)
                        <div class="swiper-slide">
                            <div class="card m-1 h-100">
                                @if ($project->fundDetail->isNotEmpty())
                                    @foreach ($project->fundDetail as $detail)
                                        @if ($loop->first)
                                            @if ($detail->types === 'video')
                                                @if ($detail->imageOrVideo && strpos($detail->imageOrVideo, 'drive') == false)
                                                    <video class="carousel-video imagesOrVideo" width="100%" controls>
                                                        <source src="{{ asset('uploads/' . $detail->imageOrVideo) }}"
                                                            type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @else
                                                    <iframe src="{{ $detail->imageOrVideo }}" width="100%"
                                                        frameborder="0">
                                                    </iframe>
                                                @endif
                                            @else
                                                @if ($detail->imageOrVideo && strpos($detail->imageOrVideo, 'drive') == false)
                                                    <img src="{{ asset('uploads/' . $detail->imageOrVideo) }}"
                                                        class="d-block w-100 imagesOrVideo" alt="Fund Image"
                                                        style="max-height: 300px; object-fit: cover;">
                                                @else
                                                    <img src="{{ $detail->imageOrVideo }}"
                                                        class="d-block w-100 imagesOrVideo" alt="Fund Image"
                                                        style="max-height: 300px; object-fit: cover;">
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                                @else
                                    <img src="{{ asset('img/default-image.png') }}" class="d-block w-100"
                                        alt="Default Image" style="max-height: 300px; object-fit: cover;">
                                @endif
                                <div class="card-body p-4">
                                    <h5 class="card-title">{{ $project->name }}</h5>
                                    <p class="card-text">{{ Str::limit($project->description, 150) }}</p>
                                    <div class="barAndDetailButton">
                                        <div class="progress w-100" style="height: 20px;">
                                            <div class="progress-bar show" role="progressbar"
                                                style="width: {{ ($project->currAmount * 100) / $project->targetAmount }}%;"
                                                aria-valuenow="{{ ($project->currAmount * 100) / $project->targetAmount }}"
                                                aria-valuemin="0" aria-valuemax="100">
                                                {{ round(($project->currAmount / $project->targetAmount) * 100) }}%
                                            </div>
                                        </div>
                                        <a href="{{ route('fund.show', $project->id) }}" class="btn btn-primary">View
                                            Details</a>
                                    </div>
                                    <p class="mt-2">Raised: <br>Rp{{ number_format($project->currAmount, 2) }} /
                                        Rp{{ number_format($project->targetAmount, 2) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="recommended-projects">
        <div class="container recommended-container p-5">
            <div class="h-container-1 d-flex justify-content-center">
                <h4 class="pb-3">We're almost made it!</h4>
            </div>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($recommended as $project)
                        <div class="swiper-slide">
                            <div class="card m-1 h-100">
                                @if ($project->fundDetail->isNotEmpty())
                                    @foreach ($project->fundDetail as $detail)
                                        @if ($loop->first)
                                            @if ($detail->types === 'video')
                                                @if (strpos($detail->imageOrVideo, 'drive') == false)
                                                    <video class="carousel-video imagesOrVideo" width="100%" controls>
                                                        <source src="{{ asset('uploads/' . $detail->imageOrVideo) }}"
                                                            type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @else
                                                    <iframe src="{{ $detail->imageOrVideo }}" width="100%"
                                                        frameborder="0">
                                                    </iframe>
                                                @endif
                                            @else
                                                @if (strpos($detail->imageOrVideo, 'drive') == false)
                                                    <img src="{{ asset('uploads/' . $detail->imageOrVideo) }}"
                                                        class="d-block w-100 imagesOrVideo" alt="Fund Image"
                                                        style="max-height: 300px; object-fit: cover;">
                                                @else
                                                    <img src="{{ $detail->imageOrVideo }}"
                                                        class="d-block w-100 imagesOrVideo" alt="Fund Image"
                                                        style="max-height: 300px; object-fit: cover;">
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                                @else
                                    <img src="{{ asset('img/default-image.png') }}" class="d-block w-100"
                                        alt="Default Image" style="max-height: 300px; object-fit: cover;">
                                @endif
                                <div class="card-body p-4">
                                    <h5 class="card-title">{{ $project->name }}</h5>
                                    <p class="card-text">{{ Str::limit($project->description, 150) }}</p>
                                    <div class="barAndDetailButton">
                                        <div class="progress w-100" style="height: 20px;">
                                            <div class="progress-bar show" role="progressbar"
                                                style="width: {{ ($project->currAmount * 100) / $project->targetAmount }}%;"
                                                aria-valuenow="{{ ($project->currAmount * 100) / $project->targetAmount }}"
                                                aria-valuemin="0" aria-valuemax="100">
                                                {{ round(($project->currAmount / $project->targetAmount) * 100) }}%
                                            </div>
                                        </div>
                                        <a href="{{ route('fund.show', $project->id) }}" class="btn btn-primary">View
                                            Details</a>
                                    </div>
                                    <p class="mt-2">Raised: <br>Rp{{ number_format($project->currAmount, 2) }} /
                                        Rp{{ number_format($project->targetAmount, 2) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="about-us container flex-column">
        <div class="header-container">
            <h4 class="fw-bold text-primary-color text-center">About Us</h4>
            <div class="p-container">
                <p class="text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla eius animi, tempora sunt quas architecto
                    eveniet rem eos in, error necessitatibus placeat, recusandae odit sint quos debitis assumenda sapiente
                    laborum!
                    Quasi, quisquam voluptatum, ad ex earum reprehenderit vel excepturi consectetur nulla maxime doloribus,
                    temporibus veniam dolorem. Cupiditate nihil sequi, hic, sed laudantium earum minus laborum perspiciatis
                    possimus voluptatem ab minima.
                    Vitae numquam quasi suscipit! Doloremque sed quisquam mollitia a voluptatibus est, eaque sapiente
                    tempore
                    magnam rem totam, nulla dignissimos? Perferendis aperiam sit, modi quaerat illum nobis quos commodi ea
                    non.
                    Soluta nam quidem beatae eligendi itaque perspiciatis, minus doloremque pariatur ex tempora provident
                    suscipit nostrum blanditiis, expedita quam corrupti labore esse cum illo amet culpa incidunt ea
                    molestiae
                    debitis! Inventore?
                </p>
            </div>
        </div>
    </section>
    <section class="our-goals container flex-column">
        <div class="header-container">
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
