@extends('layouts.admin')
@section('title')
    Ticketing
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
            <div class="search-input">
                <input class="form-control form-control-lg" type="text" placeholder="Search" aria-label=".form-control-lg example">
            </div>
            <h1>Ticketing System</h1>
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Sort By
            </button>
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
                        <th scope="col" style="background-color: #00A9A5; color: white;">Funding Name</th>
                        <th scope="col" style="background-color: #00A9A5; color: white;">Request Date</th>
                        <th scope="col" style="background-color: #00A9A5; color: white;">Time Elapsed</th>
                        <th scope="col" style="background-color: #00A9A5; color: white;">Status</th>
                        <th scope="col" style="background-color: #00A9A5; color: white;">Handled By</th>
                        <th scope="col" style="background-color: #00A9A5; color: white;">Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>9 hours</td>
                    <td class="text-warning">Asking for update</td>
                    <td>None</td>
                    <td>
                        <div class="icon-container d-flex justify-content-around align-items-center">
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                </svg>
                            </a>
                        </div>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>9 hours</td>
                    <td class="text-danger">Withdrawal Rejected</td>
                    <td>None</td>
                    <td>
                        <div class="icon-container d-flex justify-content-around align-items-center">
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                </svg>
                            </a>
                        </div>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td>Johnson Edging</td>
                    <td>Goon Fest</td>
                    <td>NOW</td>
                    <td>69 hours</td>
                    <td class="text-success">Approved</td>
                    <td>Johnson</td>
                    <td>
                        <div class="icon-container d-flex justify-content-around align-items-center">
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