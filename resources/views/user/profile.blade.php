@extends('layouts.user')
@section('title')
    Profile
@endsection
@section('cssName')
    profile
@endsection
@section('content')
    <aside>
        <div class="profile">
            <img src="{{ asset('img/LogoFund4Future.png') }}" alt="profile picture" width=40 height=40>
            <h2>{{ Auth::user()->name }}</h2>
            <p>{{ Auth::user()->email }}</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="">Profile</a></li>
                <li><a href="">Edit Profile</a></li>
                <li><a href="">Change Password</a></li>
                <li><a href="">Funding History</a></li>
                <li><a href="">Funding List</a></li>
                <li><a href="">Funding Detail</a></li>
                <li><a href="">Funding Transaction</a></li>
                <li><a href="">Funding Transaction Detail</a>
                </li>
                <li><a href="">Funding Transaction History</a>
                </li>
                <li><a href="">Funding Transaction
                        History Detail</a></li>
                <li><a href="">F
                        unding Transaction History List</a></li>
                <li><a href="">
                        Funding Transaction History List Detail</a></li>
                <li><a href="">
                        Funding Transaction History List Detail Edit</a></li>
                <li><a href="">
                        Funding Transaction History List Detail Delete</a></li>
            </ul>
        </div>
    </aside>
    <section>
        <div class="container">
            <h1>Profile</h1>
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
    </section>
@endsection
{{-- Halaman untuk Profile user, user bisa lihat, preview dan edit profilenya disini --}}
