@extends('layouts.user')
@section('title')
    Profile
@endsection
@section('cssName')
    profile
@endsection
@section('jsName')
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
                                        <div class="col col-l fs-7">
                                            <i>{{ Auth::user()->email }}</i>
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
                    <h1>Profile</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="profiletop">
                        <div class="row">
                            <div class="col">
                                @if (auth()->user()->userImg == null)
                                    <img src="{{ asset('img/AssetUser.png') }}" alt="profile picture" width="100"
                                        height="100">
                                @elseif(auth()->user()->userImg == 'AssetAdmin.png' || auth()->user()->userImg == 'AssetUser.png')
                                    <img src="{{ asset('img/' . auth()->user()->userImg) }}" alt="Bootstrap" width="100"
                                        height="100">
                                @else
                                    <img src="{{ auth()->user()->userImg }}" alt="profile picture" width=100 height=100>
                                @endif
                            </div>
                        </div>
                        <div class="row balfund">
                            <div class="col">
                                <div>
                                    Balance : <b>Rp{{ number_format(Auth::user()->balance, 0, ',', '.') }}</b> <a
                                        href="{{ route('topup') }}" class="btn btn-primary ms-2">Add Balance</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="{{ route('updateName') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 text-center">
                            <label for="profile_picture" class="form-label">Profile Picture</label>
                            <div class="mb-3">
                                @if (auth()->user()->userImg == 'AssetAdmin.png' || auth()->user()->userImg == 'AssetUser.png')
                                    <img src="{{ asset('img/' . auth()->user()->userImg) }}" alt="Bootstrap" width="60"
                                        height="60">
                                @elseif(auth()->user()->userImg == null)
                                    <img src="{{ asset('img/AssetUser.png') }}" alt="Profile Picture" class="img-thumbnail"
                                        style="max-width: 150px;">
                                @else
                                    <img src="{{ Auth::user()->userImg }}" alt="Profile Picture" class="img-thumbnail"
                                        style="max-width: 150px;">
                                @endif
                            </div>
                            <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                            @error('profile_picture')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ Auth::user()->name }}">
                        </div>

                        <div id="saveReminder" class="alert alert-warning d-none">
                            You have unsaved changes. Please click "Update Profile" to save them.
                        </div>

                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- Halaman untuk Profile user, user bisa lihat, preview dan edit profilenya disini --}}
