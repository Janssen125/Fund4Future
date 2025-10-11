@extends('layouts.user')
@section('title')
    Profile
@endsection
@section('cssName')
    profile
@endsection
@section('jsName')
    datatables
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
                                        <img src="{{ auth()->user()->userImg }}" alt="profile picture" width=60 height=60>
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
                                            <p>{{ Str::limit(Auth::user()->email, 20) }}</p>
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
            <div class="row">
                <div class="col col-l">
                    <h1>Funding Transaction History</h1>
                </div>
            </div>
            <div class="row py-3">
                <div class="col">
                    @if ($fundHistories->isEmpty())
                        <p>You have no transaction history yet.</p>
                    @else
                        <div class="w-100">
                            <table id="dataTable" class="table table-hover align-middle show">
                                <thead class="table-light show">
                                    <tr>
                                        <th>#</th>
                                        <th>Fund Name</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fundHistories as $index => $history)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $history->fund ? $history->fund->name : 'Fund not found' }}</td>
                                            <td>Rp{{ number_format($history->amount, 2) }}</td>
                                            <td>{{ $history->created_at->format('d M Y') }}</td>
                                            <td>
                                                <span class="badge bg-success">Completed</span>
                                            </td>
                                            @if ($history->fund)
                                                <td><a href="{{ route('fund.show', $history->fund->id) }}"
                                                        class="btn btn-secondary">View</a></td>
                                            @else
                                                <td><a href="#" class="btn btn-secondary disabled">View</a></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- Halaman untuk Profile user, user bisa lihat, preview dan edit profilenya disini --}}
