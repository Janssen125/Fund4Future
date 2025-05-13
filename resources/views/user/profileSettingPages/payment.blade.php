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
                                    @else
                                        <img src="{{ asset('img/' . auth()->user()->userImg) }}" alt="profile picture"
                                            width=60 height=60>
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
    <section class="bg-body-tertiary py-5">
        <div class="container">
            <div class="row">
                <div class="col col-l py-1">
                    <h1>Payment</h1>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col ">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <p class="">Amount to Pay</p>
                                <p class="fw-bold">Rp{{ number_format($amount, 0, ',', '.') }}</p>
                            </div>
                            <div class="text-center">
                                <p class="text-muted">Click the button below to proceed with the payment.</p>
                                <button id="pay-button" class="btn btn-success primary-background btn-lg px-5">Pay
                                    Now</button>
                            </div>
                        </div>
                        <div class="card-footer text-center text-muted">
                            <small>Need help? <a href="{{ route('contact') }}" class="text-primary">Contact
                                    Support</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            window.snap.pay("{{ $snapToken }}", {
                onSuccess: function(result) {
                    alert("Payment successful!");

                    fetch("{{ route('midtrans.notification') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify(result)
                        })
                        .then(response => response.json())
                        .then(data => {
                            alert("Server Response: " + JSON.stringify(data));
                        })
                        .catch(error => {
                            alert("Error sending data to server.");
                        });

                    location.href = "{{ route('profile') }}";

                },
                onPending: function(result) {
                    alert("Waiting for payment...");
                },
                onError: function(result) {
                    alert("Payment failed!");
                },
                onClose: function() {
                    alert("Payment popup closed without finishing the payment.");
                }
            });
        };
    </script>
@endsection
{{-- Halaman untuk Profile user, user bisa lihat, preview dan edit profilenya disini --}}
