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
                            <a href=""><button type="button" class="btn btn-success btn-color-primary">Start
                                    Funding</button></a>
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
                            <div class="card m-1">
                                @if ($project->fundDetail->isNotEmpty())
                                    @foreach ($project->fundDetail as $detail)
                                        @if ($loop->first)
                                            @if ($detail->types === 'video')
                                                <video class="carousel-video imagesOrVideo" width="100%" controls>
                                                    <source src="{{ asset('uploads/' . $detail->imageOrVideo) }}"
                                                        type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @else
                                                <img src="{{ asset('uploads/' . $detail->imageOrVideo) }}"
                                                    class="d-block w-100 imagesOrVideo" alt="Fund Image"
                                                    style="max-height: 300px; object-fit: cover;">
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
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="progress w-75" style="height: 20px;">
                                            <div class="progress-bar show" role="progressbar"
                                                style="width: {{ ($project->currAmount * 100) / $project->targetAmount }}%;"
                                                aria-valuenow="{{ ($project->currAmount * 100) / $project->targetAmount }}"
                                                aria-valuemin="0" aria-valuemax="100">
                                                {{ round(($project->currAmount / $project->targetAmount) * 100) }}%
                                            </div>
                                        </div>
                                        <a href="{{ route('fund.show', $project->id) }}" class="btn btn-primary ms-3">View
                                            Details</a>
                                    </div>
                                    <p class="mt-2">Raised: Rp{{ number_format($project->currAmount, 2) }} /
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
                <h4 class="pb-3">Discover Ongoing Progress</h4>
            </div>
            <div class="row">
                @foreach ($recommended as $project)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('uploads/' . ($project->fundDetail->first()->imageOrVideo ?? 'default-image.png')) }}"
                                class="card-img-top" alt="{{ $project->name }}"
                                style="max-height: 200px; object-fit: cover;">
                            <div class="card-body p-4">
                                <h5 class="card-title">{{ $project->name }}</h5>
                                <p class="card-text">{{ Str::limit($project->description, 150) }}</p>
                                <h6>Raised</h6>
                                <div class="under-card d-flex justify-content-between">
                                    <div class="progress w-60">
                                        @php
                                            $progress =
                                                $project->targetAmount > 0
                                                    ? ($project->currAmount / $project->targetAmount) * 100
                                                    : 0;
                                        @endphp
                                        <div class="progress-bar bg-primary-green" role="progressbar"
                                            aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"
                                            style="width: {{ $progress }}%;">
                                            {{ round($progress) }}%
                                        </div>
                                    </div>
                                    <div class="readmore-btn">
                                        <a class="btn btn-success btn-color-primary"
                                            href="{{ route('fund.show', $project->id) }}" role="button">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
