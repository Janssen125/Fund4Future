@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('cssName')
    admindashboard
@endsection
@section('content')
    <div>
        <h1 class="p-5">Dashboard</h1>
    </div>
    <div class="container overall-container">
        <div class="row w-100">
            <div class="col col-3">
                <div class="card">
                    <div class="inside">
                        <h4>
                            {{ $totalUsers }}
                        </h4>
                        <p>
                            Jumlah User
                        </p>
                    </div>
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col col-3">
                <div class="card">
                    <div class="inside">
                        <h4>
                            {{ $ongoingFunds }}
                        </h4>
                        <p>
                            Jumlah Funding Ongoing
                        </p>
                    </div>
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-clock-history" viewBox="0 0 16 16">
                            <path
                                d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z" />
                            <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z" />
                            <path
                                d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col col-3">
                <div class="card">
                    <div class="inside">
                        <h4>
                            {{ $totalFunds }}
                        </h4>
                        <p>
                            Jumlah Funding
                        </p>
                    </div>
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-card-list" viewBox="0 0 16 16">
                            <path
                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                            <path
                                d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col col-3">
                <div class="card">
                    <div class="inside">
                        <h4>
                            {{ $totalMails }}
                        </h4>
                        <p>
                            Jumlah Pesan
                        </p>
                    </div>
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path
                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row m-3 justify-content-between">
            <div class="col col-8 col-l">
                <div class="row rounded-3 card w-100">
                    <div class="col col-l p-3">
                        <h3>Request Funding List</h2>
                    </div>
                    <hr>
                    <div class="col">
                        @foreach ($recentFundingRequests as $fund)
                            <div class="row p-3 w-100">
                                <div class="col col-2">
                                    <img src="{{ $fund->fundDetail->first()->imageOrVideo ? asset('uploads/' . $fund->fundDetail->first()->imageOrVideo) : asset('img/LogoFund4Future.png') }}"
                                        alt="Fund Image" class="img-fluid">
                                </div>
                                <div class="col col-2">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">{{ $fund->name }}</h5>
                                    </div>
                                </div>
                                <div class="col col-2">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $fund->owner->name }}</h5>
                                    </div>
                                </div>
                                <div class="col col-2">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $fund->created_at->format('F d, Y h:i A') }}</h5>
                                    </div>
                                </div>
                                <div class="col col-2">
                                    <button type="button" class="btn btn-primary"
                                        onclick="location.href='{{ route('fund.show', $fund->id) }}'">View</button>
                                </div>
                            </div>
                            <hr class="w-100">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col col-4">
                <div class="row rounded-3 card">
                    <div class="col col-l p-3">
                        <h3>Notification</h2>
                    </div>
                    <hr>
                    <div class="col">
                        @foreach ($recentNotifications as $notif)
                            <div class="row p-3 mb-3 w-100">
                                <div class="col col-2">
                                    <h5 class="card-title fw-bold" style="white-space: nowrap">
                                        {{ ucfirst($notif['type']) }}
                                    </h5>
                                </div>
                                <div class="col col-10 col-l">
                                    <div class="row">
                                        <div class="col">
                                            <p class="card-text">
                                                {{ $notif['created_at']->format('F d, Y h:i A') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p class="card-text">
                                                {{ Str::limit($notif['details'], 30, '...') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="w-100">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row m-3 justify-content-between w-100">
            <div class="col">
                <div class="row rounded-3 card w-100">
                    <div class="col col-l p-3">
                        <h3>Your Tickets</h2>
                    </div>
                    <hr>
                    <div class="col col-l">
                        @forelse ($recentChatButNotForNotificationPlease as $chat)
                            <div class="row p-3 w-100">
                                <div class="col col-3">
                                    @if ($chat->funder->userImg == 'AssetAdmin.png' || $chat->funder->userImg == 'AssetUser.png')
                                        <img src="{{ asset('img/' . $chat->funder->userImg) }}" alt="Fund Image"
                                            class="img-fluid">
                                    @else
                                        <img src="{{ asset('storage/img/' . $chat->funder->userImg) }}" alt="Fund Image"
                                            class="img-fluid">
                                    @endif
                                </div>
                                <div class="col col-3 col-l">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold" style="white-space: nowrap">
                                            {{ $chat->funder->name }}</h5>
                                        <p class="card-text">{{ $chat->created_at->format('F d, Y h:i A') }}</p>
                                    </div>
                                </div>
                                <div class="col col-3">
                                    <span class="badge badge-warning">{{ $chat->fund->approvalStatus }}</span>
                                </div>
                                <div class="col col-3">
                                    <a href="{{ route('chats.show', $chat->id) }}" class="btn btn-primary">Chat</a>
                                </div>
                            </div>
                            <hr class="w-100">
                        @empty
                            <div class="row p-3 w-100">
                                <div class="col">
                                    <p class="text-center">No tickets found.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (auth()->user()->role == 'admin')
        <div class="container">
            <div class="row m-3 justify-content-between w-100">
                <div class="col">
                    <div class="row rounded-3 card w-100">
                        <div class="col col-l p-3">
                            <h3>Recent Activity Log</h2>
                        </div>
                        <hr>
                        <div class="col col-l">
                            @forelse ($recentActivities as $activity)
                                <div class="row p-3 w-100">
                                    <div class="col col-l">
                                        <div>
                                            <b> {{ $activity->created_at->format('F d, Y h:i A') }}</b>
                                            <p>{{ $activity->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="row p-3 w-100">
                                    <div class="col">
                                        <p class="text-center">No recent activities found.</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
{{-- Dashboard admin untuk melihat data data yang ada di webnya, seperti jumlah user, jumlah penggalangan, dll --}}
