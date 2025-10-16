@extends('layouts.admin')
@section('title')
    Website Analytics
@endsection
@section('cssName')
    admindashboard
@endsection

@section('content')
    <div>
        <h1 class="p-5">Website Analytics</h1>
    </div>
    <div class="container justify-content-start">
        <div class="row">
            <div class="col" id="theTable">
                <div class="table-responsive">
                    <table id="analyticsTable">
                        <thead>
                            <tr>
                                <th scope="col" style="background-color: #00A9A5; color:white;">No</th>
                                <th scope="col" style="background-color: #00A9A5; color:white;">User name</th>
                                <th scope="col" style="background-color: #00A9A5; color:white;">Ip Address</th>
                                <th scope="col" style="background-color: #00A9A5; color:white;">Page URL</th>
                                <th scope="col" style="background-color: #00A9A5; color:white;">User Agent</th>
                                <th scope="col" style="background-color: #00A9A5; color:white;">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($analytics as $analytic)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $analytic->user ? $analytic->user->name : 'Guest' }}</td>
                                    <td>{{ $analytic->ip_address }}</td>
                                    <td>{{ $analytic->page_url }}</td>
                                    <td>{{ $analytic->user_agent }}</td>
                                    <td>{{ $analytic->created_at->format('F d, Y h:i A') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No analytics data found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#analyticsTable').DataTable({
                "pageLength": 10,
                "lengthChange": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "searching": true,
                "columnDefs": [{
                    "orderable": false,
                    "targets": 4
                }]
            });
        });
    </script>
@endsection
