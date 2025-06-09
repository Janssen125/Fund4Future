@extends('layouts.admin')
@section('title')
    Mail List
@endsection
@section('cssName')
    admindasboard
@endsection
@section('content')
    <div>
        <h1 class="p-5">
            Mail
        </h1>
    </div>
    <div class="container mt-4">
        <h2>List Mail</h2>
        <table class="table table-bordered text-center w-75" id="mailTable">
            <thead class="table-light">
                <tr>
                    <th scope="col" style="background-color: #00A9A5; color: white;">No</th>
                    <th scope="col" style="background-color: #00A9A5; color: white;">Tanggal</th>
                    <th scope="col" style="background-color: #00A9A5; color: white;">From</th>
                    <th scope="col" style="background-color: #00A9A5; color: white;">Subject</th>
                    <th scope="col" style="background-color: #00A9A5; color: white;">View</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mails as $mail)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mail->created_at->format('Y-m-d') }}</td>
                        <td>{{ $mail->user->name }}</td>
                        <td>{{ $mail->content }}</td>
                        <td><a href="{{ route('mail.show', $mail->id) }}" class="btn btn-primary">Detail</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No mails available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#mailTable').DataTable({
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

{{-- Halaman untuk daftar pesan dari contact us, bisa Create, Read, Update. Delete cuma bisa si Admin --}}
