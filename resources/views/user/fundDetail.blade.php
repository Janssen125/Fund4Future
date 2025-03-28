@extends('layouts.user')
@section('title')
    Funding Detail
@endsection
@section('cssName')
    fund
@endsection
@section('jsName')
    fundDetail
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-6">
                <div id="fundCarousel{{ $data->id }}" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($data->fundDetail as $index => $detail)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                @if ($detail->types === 'video')
                                    <video class="carousel-video" width="100%" controls>
                                        <source src="{{ asset('uploads/' . $detail->imageOrVideo) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @else
                                    <img src="{{ asset('uploads/' . $detail->imageOrVideo) }}" class="d-block w-100"
                                        alt="Fund Image">
                                @endif
                            </div>
                        @endforeach
                    </div>

                    @if ($data->fundDetail->count() > 1)
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#fundCarousel{{ $data->id }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#fundCarousel{{ $data->id }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif
                </div>
            </div>
            <div class="col col-l col-6">
                <h2>{{ $data->name }}</h2>
                <p>{{ $data->description }}</p>
                <p><strong>Category:</strong> {{ $data->category->catName }}</p>
                <p><strong>Funding Progress:</strong> {{ $data->currAmount }} / {{ $data->targetAmount }}</p>
                <div class="progress w-100">
                    <div class="progress-bar show" role="progressbar"
                        style="width: {{ ($data->currAmount / $data->targetAmount) * 100 }}%;"
                        aria-valuenow="{{ ($data->currAmount / $data->targetAmount) * 100 }}" aria-valuemin="0"
                        aria-valuemax="100">
                        {{ round(($data->currAmount / $data->targetAmount) * 100) }}%
                    </div>
                </div>
                <a href="" class="btn btn-secondary w-100 p-3 m-3">Share</a>
                <a href="" class="btn btn-success primary-background w-100 p-3 m-3">Fund Now</a>
            </div>
        </div>
    </div>
    <div class="container">
        <hr>
        <h2>Comments</h2>
        <div class="row py-3">
            <div class="col">
                <div class="container">
                    <hr>
                    <div class="row">
                        <div class="col col-1">
                            <img src="{{ asset('img/LogoFund4Future.png') }}" alt="" srcset="" width=40
                                height=40>
                        </div>
                        <div class="col col-l col-11">
                            <div class="row">
                                <div class="col">
                                    <h3>Username</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia corrupti mollitia quis
                                        maxime? Doloremque, consequatur laborum fugit, sequi illo, aperiam provident esse
                                        sapiente quod quisquam nemo porro culpa quaerat vel.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-1">
                        </div>
                        <div class="col col-11">
                            <div class="row">
                                <div class="col col-1">
                                    <img src="{{ asset('img/LogoFund4Future.png') }}" alt="" srcset=""
                                        width=40 height=40>
                                </div>
                                <div class="col col-l col-11">
                                    <div class="row">
                                        <div class="col">
                                            <h4>Username</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia corrupti
                                                mollitia quis
                                                maxime? Doloremque, consequatur laborum fugit, sequi illo, aperiam provident
                                                esse
                                                sapiente quod quisquam nemo porro culpa quaerat vel.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-1">
                        </div>
                        <div class="col col-11">
                            <div class="row">
                                <div class="col col-1">
                                    <img src="{{ asset('img/LogoFund4Future.png') }}" alt="" srcset=""
                                        width=40 height=40>
                                </div>
                                <div class="col col-l col-11">
                                    <div class="row">
                                        <div class="col">
                                            <h4>Username</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia corrupti
                                                mollitia quis
                                                maxime? Doloremque, consequatur laborum fugit, sequi illo, aperiam provident
                                                esse
                                                sapiente quod quisquam nemo porro culpa quaerat vel.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col col-1">
                            <img src="{{ asset('img/LogoFund4Future.png') }}" alt="" srcset="" width=40
                                height=40>
                        </div>
                        <div class="col col-l col-11">
                            <form action="" method="post" class="commentform">
                                <textarea name="comment" id="" placeholder="Add Comment"></textarea>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <hr>
                    <div class="row">
                        <div class="col col-1">
                            <img src="{{ asset('img/LogoFund4Future.png') }}" alt="" srcset="" width=40
                                height=40>
                        </div>
                        <div class="col col-l col-11">
                            <div class="row">
                                <div class="col">
                                    <h3>Username</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia corrupti mollitia quis
                                        maxime? Doloremque, consequatur laborum fugit, sequi illo, aperiam provident esse
                                        sapiente quod quisquam nemo porro culpa quaerat vel.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-1">
                        </div>
                        <div class="col col-11">
                            <div class="row">
                                <div class="col col-1">
                                    <img src="{{ asset('img/LogoFund4Future.png') }}" alt="" srcset=""
                                        width=40 height=40>
                                </div>
                                <div class="col col-l col-11">
                                    <div class="row">
                                        <div class="col">
                                            <h4>Username</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia corrupti
                                                mollitia quis
                                                maxime? Doloremque, consequatur laborum fugit, sequi illo, aperiam provident
                                                esse
                                                sapiente quod quisquam nemo porro culpa quaerat vel.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-1">
                        </div>
                        <div class="col col-11">
                            <div class="row">
                                <div class="col col-1">
                                    <img src="{{ asset('img/LogoFund4Future.png') }}" alt="" srcset=""
                                        width=40 height=40>
                                </div>
                                <div class="col col-l col-11">
                                    <div class="row">
                                        <div class="col">
                                            <h4>Username</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia corrupti
                                                mollitia quis
                                                maxime? Doloremque, consequatur laborum fugit, sequi illo, aperiam provident
                                                esse
                                                sapiente quod quisquam nemo porro culpa quaerat vel.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col col-1">
                            <img src="{{ asset('img/LogoFund4Future.png') }}" alt="" srcset="" width=40
                                height=40>
                        </div>
                        <div class="col col-l col-11">
                            <form action="" method="post" class="commentform">
                                <textarea name="comment" id="" placeholder="Add Comment"></textarea>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <hr>
                    <div class="row">
                        <div class="col col-1">
                            <img src="{{ asset('img/LogoFund4Future.png') }}" alt="" srcset="" width=40
                                height=40>
                        </div>
                        <div class="col col-l col-11">
                            <div class="row">
                                <div class="col">
                                    <h3>Username</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia corrupti mollitia quis
                                        maxime? Doloremque, consequatur laborum fugit, sequi illo, aperiam provident esse
                                        sapiente quod quisquam nemo porro culpa quaerat vel.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-1">
                        </div>
                        <div class="col col-11">
                            <div class="row">
                                <div class="col col-1">
                                    <img src="{{ asset('img/LogoFund4Future.png') }}" alt="" srcset=""
                                        width=40 height=40>
                                </div>
                                <div class="col col-l col-11">
                                    <div class="row">
                                        <div class="col">
                                            <h4>Username</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia corrupti
                                                mollitia quis
                                                maxime? Doloremque, consequatur laborum fugit, sequi illo, aperiam provident
                                                esse
                                                sapiente quod quisquam nemo porro culpa quaerat vel.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-1">
                        </div>
                        <div class="col col-11">
                            <div class="row">
                                <div class="col col-1">
                                    <img src="{{ asset('img/LogoFund4Future.png') }}" alt="" srcset=""
                                        width=40 height=40>
                                </div>
                                <div class="col col-l col-11">
                                    <div class="row">
                                        <div class="col">
                                            <h4>Username</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia corrupti
                                                mollitia quis
                                                maxime? Doloremque, consequatur laborum fugit, sequi illo, aperiam provident
                                                esse
                                                sapiente quod quisquam nemo porro culpa quaerat vel.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col col-1">
                            <img src="{{ asset('img/LogoFund4Future.png') }}" alt="" srcset="" width=40
                                height=40>
                        </div>
                        <div class="col col-l col-11">
                            <form action="" method="post" class="commentform">
                                <textarea name="comment" id="" placeholder="Add Comment"></textarea>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

{{-- Halaman untuk Fund Detail user, user bisa lihat penggalangan ini dengan lebih detail dan bisa melakukan pendanaan disini --}}
