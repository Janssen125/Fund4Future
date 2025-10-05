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
                            <!-- <a href="{{ route('password.request') }}">
                                <li>Change Password</li>
                            </a> -->
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
                            <!-- <a href="{{ route('profileSettings') }}">
                                <li>Settings</li>
                            </a> -->
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
            <div class="row pb-5">
                <div class="col col-l">
                    <h1>Settings</h1>
                </div>
            </div>
            <hr>
            <div class="row py-3">
                <div class="col col-l">
                    Email Notification
                </div>
                <div class="col col-r">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="emailNotificationSwitch">
                        <label class="form-check-label" for="emailNotificationSwitch"></label>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row py-3">
                <div class="col col-l">
                    @if (Auth::user()->email_verified_at)
                        <span class="text-success">Your email is verified</span>
                    @else
                        <span class="text-danger">Your email is not verified</span>
                        <a href="{{ route('verification.notice') }}">Verify Your Email</a>
                    @endif
                </div>
                <div class="col col-r">
                    {{ Auth::user()->email }}
                </div>
            </div>
            <hr>
            <div class="row py-3">
                <div class="col col-l">
                    @if (Auth::user()->nik)
                        <span class="text-success">Your profile is verified</span>
                    @else
                        <div class="row w-50 pb-4">
                            <div class="col">
                                <span class="text-danger">Your profile is not verified</span>
                            </div>
                            <div class="col">
                                <a href="{{ route('verifyProfile') }}" class="btn btn-primary">Verify Your Profile
                                    Here</a>
                            </div>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row py-3">
                <div class="col col-l">
                    Dark Mode
                </div>
                <div class="col col-r">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="darkModeSwitch">
                        <label class="form-check-label" for="darkModeSwitch"></label>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </section>
@endsection
{{-- Halaman untuk Profile user, user bisa lihat, preview dan edit profilenya disini --}}
