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
            <div class="row">
                <div class="col col-l">
                    <h1>Profile</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="profiletop">
                        <div class="row">
                            <div class="col">
                                <img src="{{ asset('img/LogoFund4Future.png') }}" alt="profile picture" width=100
                                    height=100>
                            </div>
                        </div>
                        <div class="row balfund">
                            <div class="col">Balance: </div>
                            <div class="col">Total Funded: </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ Auth::user()->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ Auth::user()->email }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- Halaman untuk Profile user, user bisa lihat, preview dan edit profilenya disini --}}
