@extends('layouts.admin')
@section('title')
    Ticketing
@endsection
@section('cssName')
    admindashboard
@endsection
@section('content')
    <div>
        <h1 class="p-5">
            Ticketing System
        </h1>
    </div>
    <div class="container overall-container justify-content-start">
        <div class="row">
            <div class="col">
                <table id="ticketingTable" class="w-100">
                    <thead>
                        <tr>
                            <th scope="col" style="background-color: #00A9A5; color: white;">No</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">ID User</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">Funding Name</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">Request Date</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">Time Elapsed</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">Status Fund</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">Active</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">Handled By</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($funds as $index => $fund)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $fund->owner->name ?? 'Unknown User' }}</td>
                                <td>{{ $fund->name }}</td>
                                <td>{{ $fund->created_at->format('F d, Y') }}</td>
                                <td>{{ Carbon\Carbon::now()->diffForHumans($fund->created_at) }}</td>
                                <td>{{ ucfirst($fund->approvalStatus) }}</td>
                                <td>
                                    @if ($fund->chat->status == 'active')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Ended</span>
                                    @endif
                                <td>{{ $fund->chat->staff->name ?? 'None' }}</td>
                                <td>
                                    <div class="icon-container d-flex justify-content-around align-items-center">
                                        <a href="{{ route('chats.show', ['chat' => $fund->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="#000000" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                                <path
                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#ticketingTable').DataTable({
                paging: true, // Enable pagination
                searching: true, // Enable search
                ordering: true, // Enable column sorting
                info: true, // Show table information
                lengthChange: true, // Allow changing the number of rows displayed
                pageLength: 10, // Default number of rows per page
            });
        });
    </script>
@endsection
