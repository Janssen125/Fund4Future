@extends('layouts.admin')
@section('title')
    User Detail
@endsection
@section('cssName')
    admindashboard
@endsection
@section('content')
    <div>
        <h1 class="p-5">
            User Detail Page
        </h1>
    </div>
    <div class="container justify-content-start align-items-start">
        <div class="row w-100">
            <div class="col ps-5">
                @if ($data->userImg == null)
                    <img src="{{ asset('img/AssetUser.png') }}" alt="profile picture" width="120" height="120">
                @elseif($data->userImg == 'AssetAdmin.png' || $data->userImg == 'AssetUser.png')
                    <img src="{{ asset('img/' . $data->userImg) }}" alt="Bootstrap" width="120" height="120">
                @else
                    <img src="{{ asset('storage/img/' . $data->userImg) }}" alt="profile picture" width=120 height=120>
                @endif
            </div>
            <div class="col col-l">
                <table>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>: {{ $data->name }}</td>
                    </tr>
                    <tr>
                        <th>
                            Role
                        </th>
                        <td>: {{ $data->role }}</td>
                    </tr>
                    <tr>
                        <th>
                            Email
                        </th>
                        <td>: {{ $data->email }}</td>
                    </tr>
                    <tr>
                        <th>
                            Phone Number
                        </th>
                        <td>: {{ $data->nohp ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>
                            Jenis Kelamin
                        </th>
                        <td>: {{ $data->jk ?? '-' }}</td>
                    </tr>
                </table>
                <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3">Back to User List</a>
            </div>
            <div class="col">
                <table>
                    <tr>
                        <th>
                            NIK
                        </th>
                        <td>: {{ $data->NIK ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>
                            DOB
                        </th>
                        <td>:
                            {{ $data->dob ?? '-' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Joined At
                        </th>
                        <td>: {{ $data->created_at->format('F d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <th>
                            Ktp Image
                        </th>
                        <td>:
                            @if ($data->ktpImg)
                                <img src="{{ asset('storage/img/' . $data->ktpImg) }}" alt="KTP Image" width="120"
                                    height="120">
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email Verified At
                        </th>
                        <td>: {{ $data->email_verified_at ? $data->email_verified_at->format('F d, Y h:i A') : '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
