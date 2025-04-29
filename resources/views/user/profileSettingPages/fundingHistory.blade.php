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
                                    <img src="{{ asset('img/LogoFund4Future.png') }}" alt="profile picture" width=60
                                        height=60>
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
                            <li><a href="{{ route('profile') }}">Profile</a></li>
                            <li><a href="{{ route('password.request') }}">Change Password</a></li>
                            <li><a href="{{ route('profileFundingList') }}">Funding List</a></li>
                            <li><a href="{{ route('profileTransactionHistory') }}">Funding Transaction History</a></li>
                            <li><a href="{{ route('profileFundingHistory') }}">Funding History</a></li>
                            <li><a href="{{ route('profileSettings') }}">Settings</a></li>
                            <li><a href="{{ route('profileHelp') }}">Help</a></li>
                            <li><a href="{{ route('logout') }}">Logout</a></li>
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
                    <h1>Funding History</h1>
                </div>
            </div>
            <div class="row listRow">
                <div class="col">
                    @if ($fundings->isEmpty())
                        <p>There are no finished fund.</p>
                    @else
                        <div class="row">
                            @foreach ($fundings as $funding)
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $funding->name }}</h5>
                                            <p class="card-text">
                                                <strong>Funding ID:</strong> {{ $funding->id }}<br>
                                                <strong>Amount:</strong> Rp{{ number_format($funding->currAmount, 2) }} /
                                                Rp{{ number_format($funding->targetAmount, 2) }}<br>
                                                <strong>Status:</strong>
                                                @if ($funding->approvalStatus == 'finished')
                                                    <span class="badge badge-success">{{ $funding->approvalStatus }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ $funding->approvalStatus }}</span>
                                                @endif
                                            </p>
                                            <a href="{{ route('fund.show', $funding->id) }}" class="btn btn-primary">View
                                                Details</a>
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
