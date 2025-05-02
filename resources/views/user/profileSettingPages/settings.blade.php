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
            <div class="row pb-5">
                <div class="col col-l">
                    <h1>Settings</h1>
                </div>
            </div>
            <div class="row py-3">
                <div class="col col-l">
                    TBA
                </div>
                <div class="col col-l">
                    The Switch
                </div>
            </div>
            <div class="row py-3">
                <div class="col col-l">
                    TBA
                </div>
                <div class="col col-l">
                    The Switch
                </div>
            </div>
            <div class="row py-3">
                <div class="col col-l">
                    TBA
                </div>
                <div class="col col-l">
                    The Switch
                </div>
            </div>
            <div class="row py-3">
                <div class="col col-l">
                    TBA
                </div>
                <div class="col col-l">
                    The Switch
                </div>
            </div>
            <div class="row py-3">
                <div class="col col-l">
                    TBA
                </div>
                <div class="col col-l">
                    The Switch
                </div>
            </div>
            <div class="row py-3">
                <div class="col col-l">
                    TBA
                </div>
                <div class="col col-l">
                    The Switch
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- Halaman untuk Profile user, user bisa lihat, preview dan edit profilenya disini --}}
