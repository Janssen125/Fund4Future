@extends('layouts.admin')
@section('title')
    Activity Log
@endsection
@section('cssName')
    admindashboard
@endsection
@section('jsName')
    admin/navbar
@endsection

@section('content')
    <div>
        <h1 class="p-5">Activity Log</h1>
    </div>
    <div class="container">
        @forelse ($activities as $activity)
            <div class="row w-100 py-3">
                <div class="col">
                    <div class="card w-100">
                        <div class="card-body">
                            <div>
                                <h5>Name: {{ $activity->user->name ?? 'Unknown User' }}</h5>
                                <p>Role: {{ $activity->user->role ?? 'Unknown Role' }}</p>
                                <p>Date: {{ $activity->created_at->format('F d, Y h:i A') }}</p>
                                <div>
                                    <p>{{ $activity->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="row w-100">
                <div class="col w-100">
                    <div class="card w-100">
                        <div class="card-body">
                            <p>No activity logs found.</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
@endsection
