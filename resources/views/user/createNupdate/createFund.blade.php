@extends('layouts.user')
@section('title')
    Create Fund
@endsection
@section('cssName')
    profile
@endsection
@section('jsName')
    createFundUser
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
    <section class="bg-body-tertiary">
        <div class="container">
            <div class="row">
                <div class="col col-l">
                    <h1>Create Fund</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="{{ route('fund.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Fund Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Fund Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="text-danger show">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="4" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger show">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                                name="category_id" required>
                                <option value="" disabled selected>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->catName }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger show">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Target Amount -->
                        <div class="mb-3">
                            <label for="targetAmount" class="form-label">Target Amount</label>
                            <input type="number" class="form-control @error('targetAmount') is-invalid @enderror"
                                id="targetAmount" name="targetAmount" value="{{ old('targetAmount') }}" required>
                            @error('targetAmount')
                                <div class="text-danger show">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fund Details -->
                        <div id="fundDetailsContainer">
                            <h5>Fund Details</h5>
                            <div class="fund-detail mb-3">
                                <label for="fund_details[0][types]" class="form-label">Type</label>
                                <select class="form-select @error('fund_details.0.types') is-invalid @enderror"
                                    name="fund_details[0][types]" required>
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="image" {{ old('fund_details.0.types') == 'image' ? 'selected' : '' }}>
                                        Image</option>
                                    <option value="video" {{ old('fund_details.0.types') == 'video' ? 'selected' : '' }}>
                                        Video</option>
                                </select>
                                @error('fund_details.0.types')
                                    <div class="text-danger show">{{ $message }}</div>
                                @enderror

                                <label for="fund_details[0][imageOrVideo]" class="form-label mt-2">Upload File</label>
                                <input type="file"
                                    class="form-control @error('fund_details.0.imageOrVideo') is-invalid @enderror"
                                    name="fund_details[0][imageOrVideo]" onchange="previewImage(event, 0)" required>
                                @error('fund_details.0.imageOrVideo')
                                    <div class="text-danger show">{{ $message }}</div>
                                @enderror

                                <!-- Preview Section -->
                                <div id="previewContainer0" class="mt-3"></div>
                            </div>
                        </div>

                        <button type="button" id="addFundDetail" class="btn btn-secondary mb-3">Add More Details</button>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Create Fund</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
