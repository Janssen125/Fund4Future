@extends('layouts.admin')
@section('title')
    User List
@endsection
@section('cssName')
    admindashboard
@endsection
@section('content')
    <div>
        <h1 class="p-5">
            User List
        </h1>
    </div>
    <div class="container px-3">
        <div class="row">
            <div class="col" id="theTable">
                <div class="table-responsive">
                    <table id="userTable" class="w-100" style="width: max-content;">
                        <thead>
                            <tr>
                                <th scope="col" style="background-color: #00A9A5; color: white;">No</th>
                                <th scope="col" style="background-color: #00A9A5; color: white;">Name</th>
                                <th scope="col" style="background-color: #00A9A5; color: white;">Email</th>
                                <th scope="col" style="background-color: #00A9A5; color: white;">NIK</th>
                                <th scope="col" style="background-color: #00A9A5; color: white;">Email Verified</th>
                                <th scope="col" style="background-color: #00A9A5; color: white;">User Img</th>
                                <th scope="col" style="background-color: #00A9A5; color: white;">Role</th>
                                <th scope="col" style="background-color: #00A9A5; color: white;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($datas as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->NIK ?? '-' }}</td>
                                    @if ($data->email_verified_at)
                                        <td>{{ $data->email_verified_at->format('F d, Y h:i A') }}</td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    <td>
                                        @if ($data->userImg == null)
                                            <img src="{{ asset('img/AssetUser.png') }}" alt="profile picture" width="60"
                                                height="60">
                                        @elseif($data->userImg == 'AssetAdmin.png' || $data->userImg == 'AssetUser.png')
                                            <img src="{{ asset('img/' . $data->userImg) }}" alt="Bootstrap" width="60"
                                                height="60">
                                        @else
                                            <img src="{{ route('getimage', $data->userImg) }}" alt="profile picture"
                                                width=60 height=60>
                                        @endif
                                    </td>
                                    <td>{{ $data->role }}</td>
                                    <td>
                                        <a href="{{ route('user.show', $data->id) }}" class="btn btn-primary">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="text-center">No users found.</td>
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

            $('#userTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                lengthChange: true,
                pageLength: 10,
                scrollX: true,
                scrollCollapse: true,
                autoWidth: false,
                responsive: false
            });
        });
    </script>
@endsection
{{-- Halaman untuk daftar user, hanya bisa diakses ama admin --}}
