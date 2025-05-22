@extends('layouts.user')
@section('title')
    Chat
@endsection
@section('cssName')
    chat
@endsection
@section('content')
    <section>
        <div class="container dvh-100">
            <div class="row align-items-start justify-content-start py-5">
                <div class="col col-l">
                    <div class="row w-50">
                        @if ($chat->staff_id == null)
                            <div class="col col-l">
                                <img src="{{ asset('img/LogoFund4Future.png') }}" width=40 height=40 alt="">
                            </div>
                            <div class="col col-l">
                                Waiting For Staff...
                            </div>
                        @else
                            <div class="col col-l">
                                @if ($chat->staff->userImg == 'AssetUser.png' || $chat->staff->userImg == 'AssetAdmin.png')
                                    <img src="{{ asset('img/' . $chat->staff->userImg) }}" alt="profile picture"
                                        width="40" height="40">
                                @else
                                    <img src="{{ asset('storage/img/' . $chat->staff->userImg) }}" width=40 height=40
                                        alt="">
                                @endif
                            </div>
                            <div class="col col-l">
                                <b>{{ $chat->staff->name }}</b>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col col-l">
                            Created at: {{ $chat->created_at }}
                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class="col col-l">
                            <span>
                                <b>Chat ID: </b>
                                {{ $chat->id }}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-l">
                            <span>
                                <b>Status: </b>
                                {{ $chat->fund->approvalStatus }}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-l">
                            Attachments:
                        </div>
                    </div>
                    <div class="row">
                        {{ $hasAttachment = false }}
                        @foreach ($chat->chatDetails as $detail)
                            @if ($detail->attachment)
                                <div class="col col-l mb-3">
                                    <p><strong>Description:</strong> {{ $detail->message }}</p>
                                    <p><strong>Type:</strong> {{ ucfirst($detail->type) }}</p>
                                    <p><strong>Attachment:</strong></p>
                                    @if (in_array($detail->type, ['image', 'video']))
                                        <a href="{{ asset($detail->attachment) }}" target="_blank">
                                            @if ($detail->type == 'image')
                                                <img src="{{ asset($detail->attachment) }}" alt="Attachment"
                                                    class="img-thumbnail" style="max-width: 200px;">
                                            @elseif ($detail->type == 'video')
                                                <video controls style="max-width: 200px;">
                                                    <source src="{{ asset($detail->attachment) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @endif
                                        </a>
                                    @else
                                        <a href="{{ asset($detail->attachment) }}"
                                            target="_blank">{{ $detail->attachment_name }}</a>
                                    @endif
                                </div>
                                {{ $hasAttachment = true }}
                            @endif
                        @endforeach
                        @if ($hasAttachment == false)
                            <div class="col col-l mb-3">
                                <p>No attachments found.</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="container py-3">
                        <div class="row">
                            <div class="col col-1">
                                <img src="{{ asset('img/LogoFund4Future.png') }}" width=40 height=40 alt="">
                            </div>
                            <div class="col col-11 col-l">
                                <div class="row w-100">
                                    <div class="col col-l">
                                        <b>AB</b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-l">
                                        Mei 19, 2025 at 11.18 AM
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-l py-4">
                                [Pesan dari AB]
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="container py-3">
                        <div class="row">
                            <div class="col col-1">
                                <img src="{{ asset('img/LogoFund4Future.png') }}" width=40 height=40 alt="">
                            </div>
                            <div class="col col-11 col-l">
                                <div class="row w-100">
                                    <div class="col col-l">
                                        <b>AB</b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-l">
                                        Mei 19, 2025 at 11.18 AM
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-l py-4">
                                [Pesan dari AB]
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="container py-3">
                        <div class="row">
                            <div class="col col-1">
                                <img src="{{ asset('img/LogoFund4Future.png') }}" width=40 height=40 alt="">
                            </div>
                            <div class="col col-11 col-l">
                                <div class="row w-100">
                                    <div class="col col-l">
                                        <b>AB</b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-l">
                                        Mei 19, 2025 at 11.18 AM
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-l py-4">
                                [Pesan dari AB]
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="containter">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="inputText" id="textId">
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-primary">submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
