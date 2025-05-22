@extends('layouts.user')
@section('title')
    Profile
@endsection
@section('cssName')
    profile
@endsection
@section('content')
    <aside>
        <div class="container">
            <div class="row">
                <div class="col bg-body-tertiary">
                    <div class="profile">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    @if (auth()->user()->userImg == null)
                                        <img src="{{ asset('img/AssetUser.png') }}" alt="profile picture" width="60"
                                            height="60">
                                    @elseif(auth()->user()->userImg == 'AssetAdmin.png' || auth()->user()->userImg == 'AssetUser.png')
                                        <img src="{{ asset('img/' . auth()->user()->userImg) }}" alt="Bootstrap"
                                            width="60" height="60">
                                    @else
                                        <img src="{{ asset('storage/img/' . auth()->user()->userImg) }}"
                                            alt="profile picture" width=60 height=60>
                                    @endif
                                </div>
                                <div class="col col-l">
                                    <div class="row">
                                        <div class="col col-l">
                                            <b>{{ Auth::user()->name }}</b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-l">
                                            {{ Auth::user()->email }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu">
                        <ul>
                            <a href="{{ route('profile') }}">
                                <li>Profile</li>
                            </a>
                            <a href="{{ route('password.request') }}">
                                <li>Change Password</li>
                            </a>
                            <a href="{{ route('profileFundingList') }}">
                                <li>Funding List</li>
                            </a>
                            <a href="{{ route('profileTransactionHistory') }}">
                                <li>Funding Transaction History</li>
                            </a>
                            <a href="{{ route('profileFundingHistory') }}">
                                <li>Funding History</li>
                            </a>
                            <a href="{{ route('topup') }}">
                                <li>Add Balance</li>
                            </a>
                            <a href="{{ route('profileSettings') }}">
                                <li>Settings</li>
                            </a>
                            <a href="{{ route('profileHelp') }}">
                                <li>Help</li>
                            </a>
                            <a href="{{ route('logout') }}">
                                <li>Logout</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <span class="customborder"></span>
                </div>
            </div>
        </div>
    </aside>
    <section class="bg-body-tertiary">
        <div class="container">
            <div class="row">
                <div class="col col-l py-1">
                    <h1>Funding List</h1>
                </div>
                <div class="col col-r">
                    <div class="row">
                        <div class="col col-r">
                            <a href="{{ route('profile.createFund') }}" class="btn btn-primary">Create Fund</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row listRow">
                <div class="col">
                    @if ($fundings->isEmpty())
                        <p>You have not created any funds yet.</p>
                    @else
                        <div class="row justify-content-start">
                            @foreach ($fundings as $funding)
                                <div class="col-md-4 mb-4 align-items-start">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $funding->name }}</h5>
                                            <p class="card-text">
                                                <strong>Funding ID:</strong> {{ $funding->id }}<br>
                                                <strong>Amount:</strong> Rp{{ number_format($funding->currAmount, 2) }} /
                                                Rp{{ number_format($funding->targetAmount, 2) }}<br>
                                                <strong>Status:</strong>
                                                @if ($funding->approvalStatus == 'approved')
                                                    @if ($funding->currAmount >= $funding->targetAmount)
                                                        <span class="badge badge-success">Withdrawal in Progress (Chat to
                                                            continue)</span>
                                                    @else
                                                        <span
                                                            class="badge badge-success">{{ $funding->approvalStatus }}</span>
                                                    @endif
                                                @else
                                                    <span class="badge badge-warning">{{ $funding->approvalStatus }}</span>
                                                @endif
                                            </p>
                                            <a href="{{ route('fund.show', $funding->id) }}" class="btn btn-primary">View
                                                Details</a>
                                            <a href="{{ route('chats.show', $funding->id) }}"
                                                class="btn btn-primary">Chat</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- Halaman untuk Profile user, user bisa lihat, preview dan edit profilenya disini --}}
