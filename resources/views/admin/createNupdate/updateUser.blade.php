@extends('layouts.admin')
@section('title')
    Update User
@endsection
@section('cssName')
    admindashboard
@endsection
@section('content')
    <div>
        <h1 class="p-5">User List</h1>
    </div>
    <div class="container justify-content-start pb-3">
        <div class="row px-5 w-100">
            <div class="col col-l">
                <h2>Update User</h2>
            </div>
        </div>
        <div class="row px-5 w-100">
            <div class="col col-l w-100">
                <form action="{{ route('user.update', $data->id) }}" method="POST" enctype="multipart/form-data"
                    class="w-100">
                    @csrf
                    @method('PUT')
                    <div class="row w-100 py-3">
                        <div class="col col-l">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $data->name) }}" required>
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col col-l">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', $data->email) }}" required>
                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row w-100 py-3">
                        <div class="col col-l">
                            <label for="nohp" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="nohp" name="nohp"
                                value="{{ old('nohp', $data->nohp) }}">
                            @error('nohp')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col col-l">
                            <label for="jk" class="form-label">Gender</label>
                            <select class="form-control" id="jk" name="jk" required>
                                <option value="pria" {{ old('jk', $data->jk) == 'pria' ? 'selected' : '' }}>Pria
                                </option>
                                <option value="wanita" {{ old('jk', $data->jk) == 'wanita' ? 'selected' : '' }}>Wanita
                                </option>
                            </select>
                            @error('jk')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row w-100 py-3">
                        <div class="col col-l">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob"
                                value="{{ old('dob', $data->dob) }}" required>
                            @error('dob')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col col-l">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="admin" {{ old('role', $data->role) == 'admin' ? 'selected' : '' }}>Admin
                                </option>
                                <option value="user" {{ old('role', $data->role) == 'user' ? 'selected' : '' }}>User
                                </option>
                                <option value="staff" {{ old('role', $data->role) == 'staff' ? 'selected' : '' }}>Staff
                                </option>
                            </select>
                            @error('role')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row w-100 py-3">
                        <div class="col col-l">
                            <label for="balance" class="form-label">Balance</label>
                            <input type="number" class="form-control" id="balance" name="balance"
                                value="{{ old('balance', $data->balance) }}" required>
                            @error('balance')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col col-l">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik"
                                value="{{ old('nik', $data->nik) }}">
                            @error('nik')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row w-100 py-3">
                        <div class="col col-l">
                            <label for="userImg" class="form-label">User Image</label>
                            <input type="file" class="form-control" id="userImg" name="userImg">
                            @error('userImg')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row w-100 py-3">
                        <div class="col col-l">
                            <label for="ktpImg" class="form-label">KTP Image</label>
                            <input type="file" class="form-control" id="ktpImg" name="ktpImg">
                            @error('ktpImg')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            </div>
        </div>
    </div>
@endsection
{{-- Halaman untuk Update User --}}
