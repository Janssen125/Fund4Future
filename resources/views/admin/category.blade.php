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
                        <a href="#" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0d6efd" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.854a.5.5 0 0 1 .708 0l2.292 2.292a.5.5 0 0 1 0 .708l-9.439 9.439a.5.5 0 0 1-.168.11l-4 1.5a.5.5 0 0 1-.65-.65l1.5-4a.5.5 0 0 1 .11-.168l9.439-9.439zM11.207 2.5 3 10.707V13h2.293L13.5 4.793 11.207 2.5z"/>
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
            <tr>
                <th scope="row">2</th>
                <td>null</td>
                <td>
                    <div class="icon-container d-flex justify-content-center gap-3 align-items-center">
                        <a href="#" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0d6efd" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.854a.5.5 0 0 1 .708 0l2.292 2.292a.5.5 0 0 1 0 .708l-9.439 9.439a.5.5 0 0 1-.168.11l-4 1.5a.5.5 0 0 1-.65-.65l1.5-4a.5.5 0 0 1 .11-.168l9.439-9.439zM11.207 2.5 3 10.707V13h2.293L13.5 4.793 11.207 2.5z"/>
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
            <tr>
                <th>3</th>
                <td>null</td>
                <td>
                    <div class="icon-container d-flex justify-content-center gap-3 align-items-center">
                        <a href="#" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0d6efd" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.854a.5.5 0 0 1 .708 0l2.292 2.292a.5.5 0 0 1 0 .708l-9.439 9.439a.5.5 0 0 1-.168.11l-4 1.5a.5.5 0 0 1-.65-.65l1.5-4a.5.5 0 0 1 .11-.168l9.439-9.439zM11.207 2.5 3 10.707V13h2.293L13.5 4.793 11.207 2.5z"/>
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
