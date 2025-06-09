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
            <div class="col">
                <table id="userTable">
                    <thead>
                        <tr>
                            <th scope="col" style="background-color: #00A9A5; color: white;">No</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">Name</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">Email</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">Email Verified</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">No Hp</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">Gender</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">Date Of Birth</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">Balance</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">NIK</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">User Img</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">Ktp Img</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">Join Date</th>
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
                                @if ($data->email_verified_at)
                                    <td>{{ $data->email_verified_at->format('F d, Y h:i A') }}</td>
                                @else
                                    <td>-</td>
                                @endif
                                <td>{{ $data->nohp }}</td>
                                <td>{{ $data->jk }}</td>
                                <td>{{ $data->dob }}</td>
                                <td>{{ $data->balance }}</td>
                                <td>
                                    @if ($data->nik)
                                        {{ $data->nik }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($data->userImg == 'AssetUser.png' || $data->userImg == 'AssetAdmin.png')
                                        <img src="{{ asset('img/' . $data->userImg) }}" alt="Foto" class="img-fluid">
                                    @else
                                        <img src="{{ asset('storage/img/' . $data->userImg) }}" alt="Foto"
                                            class="img-fluid">
                                    @endif
                                </td>
                                <td>
                                    @if ($data->ktpImg)
                                        <img src="{{ asset('storage/ktp_images/' . $data->ktpImg) }}" alt=""
                                            class="img-fluid">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $data->created_at->format('F d, Y h:i A') }}</td>
                                <td>{{ $data->role }}</td>
                                <td>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ route('user.edit', $data->id) }}" title="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="rgb(0, 169, 165)" class="bi bi-pencil-square"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-link p-0" title="Delete"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal-{{ $data->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#dc3545" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 1a1 1 0 0 0-1 1v1h13V2a1 1 0 0 0-1-1H2.5zM1.5 4a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 .5.5v9a2 2 0 0 1-2 2h-9a2 2 0 0 1-2-2V4z" />
                                                    </svg>
                                                </button>
                                                <div class="modal fade" id="deleteModal-{{ $data->id }}" tabindex="-1"
                                                    aria-labelledby="deleteModalLabel-{{ $data->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="deleteModalLabel-{{ $data->id }}">Confirm
                                                                    Delete</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete the user
                                                                <strong>{{ $data->name }}</strong>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <form action="{{ route('user.destroy', $data->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
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
{{-- Halaman untuk daftar user, hanya bisa diakses ama admin --}}
