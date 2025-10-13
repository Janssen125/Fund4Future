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
    <div class="container justify-content-start">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    @if ($funds && $funds->count() > 0)
                        <table id="ticketingTable">
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
                                            @if ($fund->chat && $fund->chat->status == 'active')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Ended</span>
                                            @endif
                                        <td>{{ $fund->chat->staff->name ?? 'None' }}</td>
                                        <td>
                                            <div class="icon-container d-flex justify-content-around align-items-center">
                                                @if ($fund->chat && $fund->chat->staff_id)
                                                    <a href="{{ route('chats.show', ['chat' => $fund->id]) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="#000000" class="bi bi-eye-fill"
                                                            viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                                            <path
                                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 3.5 0 0 0 0 7" />
                                                        </svg>
                                                    </a>
                                                @else
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#handleModal-{{ $fund->id }}">
                                                        Handle
                                                    </button>
                                                    <div class="modal fade" id="handleModal-{{ $fund->id }}"
                                                        tabindex="-1"
                                                        aria-labelledby="handleModalLabel-{{ $fund->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="handleModalLabel-{{ $fund->id }}">Confirm
                                                                        Handle
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to handle this chat? You will be
                                                                    redirected to the chat page.
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>
                                                                    <form
                                                                        action="{{ route('chats.edit', ['chat' => $fund->id]) }}"
                                                                        method="GET">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Handle</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info w-100 text-info">
                            No Ticketing At This Moment
                        </div>
                    @endif
                </div>
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
