@extends('layouts.admin')
@section('title')
    Category List
@endsection
@section('cssName')
    admindashboard
@endsection
@section('content')
    <h1 class="row">Category List</h1>
    <div class="ticketing-table w-75 d-flex justify-content-center mt-5">
    <table class="table w-75 table-bordered">
        <thead>
            <tr>
                <th scope="col" style="background-color: #00A9A5; color: white;">No</th>
                <th scope="col" style="background-color: #00A9A5; color: white;">Category Name</th>
                <th scope="col" style="background-color: #00A9A5; color: white;">Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>udin</td>
                <td>
                    <div class="icon-container d-flex justify-content-center gap-3 align-items-center">
                        <a href="#" title="View">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                            </svg>
                        </a>
                        <a href="#" title="Delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#dc3545" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1h13V2a1 1 0 0 0-1-1H2.5zM1.5 4a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 .5.5v9a2 2 0 0 1-2 2h-9a2 2 0 0 1-2-2V4z"/>
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
{{-- Halaman ini untuk mengatur kategori penggalangan dana, kayaknya admin only ini --}}
