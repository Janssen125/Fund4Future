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
                                    <img src="{{ asset('img/' . auth()->user()->userImg) }}" alt="profile picture" width=60
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
                    <h1>Top Up Balance</h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col ">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('midtrans.topup') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="topupAmount" class="form-label">Select Amount</label>
                                    <div class="btn-group w-100" role="group" aria-label="Top Up Amounts">
                                        <input type="radio" class="btn-check" name="amount" id="amount1" value="10000"
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary" for="amount1">Rp10.000</label>

                                        <input type="radio" class="btn-check" name="amount" id="amount2" value="25000"
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary" for="amount2">Rp25.000</label>

                                        <input type="radio" class="btn-check" name="amount" id="amount3" value="50000"
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary" for="amount3">Rp50.000</label>

                                        <input type="radio" class="btn-check" name="amount" id="amount4" value="75000"
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary" for="amount4">Rp75.000</label>

                                        <input type="radio" class="btn-check" name="amount" id="amount5" value="100000"
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary" for="amount5">Rp100.000</label>

                                        <input type="radio" class="btn-check" name="amount" id="amount6" value="500000"
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary" for="amount6">Rp500.000</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="customAmount" class="form-label">Or Enter Custom Amount</label>
                                    <input type="number" class="form-control" id="customAmount" name="customAmount"
                                        placeholder="Enter custom amount (min: 10000)">
                                </div>
                                <button type="submit" class="btn btn-success primary-background w-100">Top Up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- Halaman untuk Profile user, user bisa lihat, preview dan edit profilenya disini --}}
