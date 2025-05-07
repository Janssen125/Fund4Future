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
        @if (session('message'))
            <div class="alert alert-success w-100 text-success">
                {{ session('message') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger w-100 text-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="row min-height-75">
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
            <div class="col col-l col-6 right-content">
                <div class="row">
                    <div class="col">
                        <h2>{{ $data->name }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>{{ $data->description }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><strong>Category:</strong> {{ $data->category->catName }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><strong>Funding Progress:</strong> Rp.{{ number_format($data->currAmount, 2) }} /
                            Rp.{{ number_format($data->targetAmount, 2) }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="progress">
                            <div class="progress-bar show px-1" role="progressbar"
                                style="width: {{ ($data->currAmount / $data->targetAmount) * 100 }}%;"
                                aria-valuenow="{{ ($data->currAmount / $data->targetAmount) * 100 }}" aria-valuemin="0"
                                aria-valuemax="100">
                                {{ round(($data->currAmount / $data->targetAmount) * 100) }}%
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button id="shareButton" class="btn btn-secondary w-100 p-3 my-3"
                            data-link="{{ url()->current() }}">Share</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @if ($data->currAmount >= $data->targetAmount)
                            <div class="alert alert-success w-100 text-success">
                                Fund Target FullFilled!!! Thank you for funding 🙏🙏
                            </div>
                        @else
                            <form action="{{ route('process.funds') }}" method="POST">
                                @csrf
                                <input type="hidden" name="fund_id" value="{{ $data->id }}">
                                <div class="btn-group w-100" role="group" aria-label="Funding Amounts">
                                    <input type="radio" class="btn-check" name="fundAmount" id="amount1" value="10000"
                                        autocomplete="off">
                                    <label class="btn btn-outline-primary" for="amount1">Rp10.000</label>

                                    <input type="radio" class="btn-check" name="fundAmount" id="amount2" value="25000"
                                        autocomplete="off">
                                    <label class="btn btn-outline-primary" for="amount2">Rp25.000</label>

                                    <input type="radio" class="btn-check" name="fundAmount" id="amount3" value="50000"
                                        autocomplete="off">
                                    <label class="btn btn-outline-primary" for="amount3">Rp50.000</label>

                                    <input type="radio" class="btn-check" name="fundAmount" id="amount4" value="75000"
                                        autocomplete="off">
                                    <label class="btn btn-outline-primary" for="amount4">Rp75.000</label>

                                    <input type="radio" class="btn-check" name="fundAmount" id="amount5"
                                        value="100000" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="amount5">Rp100.000</label>

                                    <input type="radio" class="btn-check" name="fundAmount" id="amount6"
                                        value="500000" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="amount6">Rp500.000</label>
                                </div>
                                <div class="mt-3">
                                    <label for="customAmount" class="form-label">Or Enter Custom Amount</label>
                                    <input type="number" class="form-control" id="customAmount" name="customAmount"
                                        placeholder="Enter custom amount ( min: Rp10.000 )">
                                </div>
                                <button type="submit" id="fundNowButton"
                                    class="btn btn-success primary-background w-100 p-3 my-3" disabled>Fund Now</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <hr>
        <h2>Comments</h2>
        <div class="row py-3">
            <div class="col">
                <div class="container">
                    @foreach ($data->comment as $comment)
                        <div class="row">
                            <div class="col col-1">
                                <img src="{{ asset('img/LogoFund4Future.png') }}" alt="" width="40"
                                    height="40">
                            </div>
                            <div class="col col-l col-11">
                                <div class="row">
                                    <div class="col">
                                        <h3>{{ $comment->user->name ?? 'Anonymous' }}</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($comment->reply as $reply)
                            <div class="row">
                                <div class="col col-1"></div>
                                <div class="col col-l col-11">
                                    <div class="row w-100">
                                        <div class="col col-1">
                                            <img src="{{ asset('img/LogoFund4Future.png') }}" alt=""
                                                width="40" height="40">
                                        </div>
                                        <div class="col col-l col-11">
                                            <div class="row">
                                                <div class="col">
                                                    <h4>{{ $reply->user->name ?? 'Anonymous' }}</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p>{{ $reply->replyText }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if (!auth()->guest())
                            <div class="row">
                                <div class="col col-1"></div>
                                <div class="col col-l col-11">
                                    <div class="row w-100">
                                        <div class="col col-1">
                                            <img src="{{ asset('img/LogoFund4Future.png') }}" alt=""
                                                width="30" height="30">
                                        </div>
                                        <div class="col col-l col-11">
                                            <form action="{{ route('comments.reply') }}" method="post"
                                                class="replyform">
                                                @csrf
                                                <textarea name="replyText" placeholder="Add Reply"></textarea>
                                                <input type="hidden" name="comments_id" value="{{ $comment->id }}">
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <hr>
                    @endforeach
                    @if (auth()->guest())
                        <div class="row">
                            <div class="col col-1"></div>
                            <div class="col col-11">
                                <a href="{{ route('login') }}">Please login to add a comment</a>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col col-l">
                                <h3>Add Comment</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-11">
                                <div class="row w-100">
                                    <div class="col col-1">
                                        <img src="{{ asset('img/LogoFund4Future.png') }}" alt="" width="40"
                                            height="40">
                                    </div>
                                    <div class="col col-l col-11">
                                        <form action="{{ route('comments.store') }}" method="post" class="commentform">
                                            @csrf
                                            <textarea name="comment" placeholder="Add Comment"></textarea>
                                            <input type="hidden" name="fund_id" value="{{ $data->id }}">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Halaman untuk Fund Detail user, user bisa lihat penggalangan ini dengan lebih detail dan bisa melakukan pendanaan disini --}}
