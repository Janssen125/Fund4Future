@extends('layouts.admin')
@section('title')
    Notification
@endsection
@section('cssName')
    adminnotification
@endsection
@section('jsName')
    admin/deleteNotification
@endsection
@section('content')
    <div>
        <h1 class="p-5">
            Notifications
        </h1>
    </div>
    <div class="container">
        <div class="container">
            <h3 class="text-center py-3">New Chats</h3>
            @forelse ($notifChat as $chat)
                <div class="container border rounded p-3 mb-3 w-75">
                    <div class="row w-100">
                        <div class="col col-2">
                            @if ($chat->staff->userImg == null)
                                <img src="{{ asset('img/AssetUser.png') }}" alt="Staff Image" width="50">
                            @elseif($chat->staff->userImg == 'AssetAdmin.png' || $chat->staff->userImg == 'AssetUser.png')
                                <img src="{{ asset('img/' . $chat->staff->userImg) }}" alt="Staff Image" width="50">
                            @else
                                <img src="{{ route('getimage', $chat->staff->userImg) }}" alt="Staff Image" width="50">
                            @endif
                        </div>
                        <div class="col col-2">
                            <p>Chat ID: {{ $chat->id }}</p>
                        </div>
                        <div class="col col-2">
                            <p>Staff: <b>{{ $chat->staff->name }}</b></p>
                        </div>
                        <div class="col col-2">
                            <p>Chat with <b>{{ $chat->funder->name }}</b></p>
                        </div>
                        <div class="col col-2">
                            <p>{{ $chat->created_at->format('F d, Y') }}</p>
                            <p>{{ $chat->created_at->format('h:i A') }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No new chats.</p>
            @endforelse
        </div>
        <div class="container my-4">
            <h3 class="text-center">New Mails</h3>
            @forelse ($notifMail as $mail)
                <div class="container border rounded p-3 mb-3 w-75">
                    <div class="row w-100">
                        <div class="col col-3 col-l">
                            <p>Subject: <b>{{ Str::limit($mail->title, 10, '...') }}</b></p>
                        </div>
                        <div class="col col-3 col-l">
                            <p>Message: <b>{{ Str::limit($mail->content, 20, '...') }}</b></p>
                        </div>
                        <div class="col col-3 col-l">
                            <p>{{ $mail->created_at->format('F d, Y') }}</p>
                            <p>{{ $mail->created_at->format('h:i A') }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No new mails.</p>
            @endforelse
        </div>

        <div class="container my-4">
            <h3 class="text-center">New Tickets</h3>
            @forelse ($notifFund as $ticket)
                <div class="container border rounded p-3 mb-3 w-75">
                    <div class="row w-100">
                        <div class="col col-3 col-l">
                            <p>Fund Name: <b>{{ $ticket->name }}</b></p>
                        </div>
                        <div class="col col-3 col-l">
                            <p>Created by: <b>{{ $ticket->owner->name }}</b></p>
                        </div>
                        <div class="col col-3 col-l">
                            <p>{{ $ticket->created_at->format('F d, Y') }}</p>
                            <p>{{ $ticket->created_at->format('h:i A') }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No new tickets.</p>
            @endforelse
        </div>
    </div>
@endsection
