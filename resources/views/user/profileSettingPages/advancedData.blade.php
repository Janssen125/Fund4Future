@extends('layouts.user')
@section('title')
    Profile
@endsection
@section('cssName')
    profile
@endsection
@section('jsName')
    advancedData
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
                    <h1>Verify Your Account</h1>
                </div>
            </div>
            <div class="row listRow">
                <div class="col">
                    <div class="row">
                        <div class="col col-l">
                            <p>To verify your account, please upload a photo of your ID card (KTP) and a selfie with your
                                ID card.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-l">
                            <form action="{{ route('saveNikAndKtp') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik"
                                        value="{{ old('nik', auth()->user()->nik) }}" maxlength="16" required>
                                    @error('nik')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="ktp_img" class="form-label">Upload KTP (Image or PDF)</label>
                                    <input type="file" class="form-control" id="ktp_img" name="ktp_img" required>
                                    @error('ktp_img')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Preview Section -->
                                <div class="mb-3" id="previewSection" style="display: none;">
                                    <h5>Preview:</h5>
                                    <div id="previewContent"></div>
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- Halaman untuk Profile user, user bisa lihat, preview dan edit profilenya disini --}}
