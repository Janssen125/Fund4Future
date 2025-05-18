@extends('layouts.admin')
@section('title')
    User Management
@endsection
@section('cssName')
admindashboard
@endsection
@section('jsName')
admin/navbar
@endsection

@section('content')
    <section class="ticketing-section d-flex justify-content-center align-items-center bg-success">
    <div class="ticketing-container w-100 bg-light ">
        <div class="ticketing-nav d-flex justify-content-around mt-5">
            <h1>User Management</h1>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><button class="dropdown-item" type="button">Action</button></li>
                <li><button class="dropdown-item" type="button">Another action</button></li>
                <li><button class="dropdown-item" type="button">Something else here</button></li>
            </ul>
        </div>
        <div class="ticketing-table w-100 d-flex justify-content-center mt-5">
            <table class="table w-75 table-bordered ">
                <thead>
                    <tr>
                        <th scope="col" style="background-color: #00A9A5; color: white;">No</th>
                        <th scope="col" style="background-color: #00A9A5; color: white;">ID User</th>
                        <th scope="col" style="background-color: #00A9A5; color: white;">Email</th>
                        <th scope="col" style="background-color: #00A9A5; color: white;">Role</th>
                        <th scope="col" style="background-color: #00A9A5; color: white;">Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto@gmail.com</td>
                        <td>Idk</td>
                        <td>
                            <div class="icon-container d-flex justify-content-around align-items-center">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-arrow-up-right-square" viewBox="0 0 16 16" style="color : #000000">
                                        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707z"/>
                                    </svg>
                                </a>
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                    </svg>
                                </a>
                                
                            </div>
                        </td>
                        
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="pagination d-flex justify-content-center mt-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#00A9A5" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
            </svg>
            <h2 class="px-5">1</h2>
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#00A9A5" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1"/>
            </svg>
        </div>
    </div>
</section>
@endsection