@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('cssName')
admindashboard
@endsection
@section('content')
<section class="dashboard-section dvh-150">
    <div class="dashboard-text">
        <h1 class="p-5">Admin Dashboard</h1>
    </div>
    <div class="funding-list-section d-flex mx-5 gap-5">
        <div class="funding-list w-75 bg-light rounded-3">
            <div class="funding-list-box m-4">
                <div class="funding-list-text">
                    <h3>Request Funding List</h2>
                </div>
                <hr>
                {{-- Cards for funding list --}}
                <div class="card mb-3" style="max-width: 1000px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title fw-bold">User Melvin</h5>
                          <p class="card-text">Fund Raised</p>
                          <div class="progress">
                            <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="card mb-3" style="max-width: 1000px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title fw-bold">User Melvin</h5>
                          <p class="card-text">Fund Raised</p>
                          <div class="progress">
                            <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="card mb-3" style="max-width: 1000px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title fw-bold">User Melvin</h5>
                          <p class="card-text">Fund Raised</p>
                          <div class="progress">
                            <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="notification-list bg-light rounded-3">
            <div class="notification-box">
                <div class="notification-list-text">
                    <h2>Notification</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="convertfunding-section d-flex mx-5 my-5 gap-5">
        <div class="convertfunding-list w-75 bg-light rounded-3">
            <div class="convertfunding-list-box m-4">
                <div class="convertfunding-list-text">
                    <h3>Request Convert Funding</h2>
                </div>
                <hr>
                {{-- Cards for convert funding list --}}
                <div class="card mb-3" style="max-width: 1000px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body d-flex justify-content-between">
                            <div class="left-part w-75">
                                <h5 class="card-title fw-bold">User Melvin</h5>
                                <p class="card-text">Fund Raised</p>
                                <div class="progress">
                                    <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                          <div class="right-part w-25 d-flex align-items-center justify-content-center">
                            <a href="" class="link-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                                </svg>
                            </a>
                        </div>
                       </div> 
                      </div>
                    </div>
                </div>
                <div class="card mb-3" style="max-width: 1000px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body d-flex justify-content-between">
                            <div class="left-part w-75">
                                <h5 class="card-title fw-bold">User Melvin</h5>
                                <p class="card-text">Fund Raised</p>
                                <div class="progress">
                                    <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                          <div class="right-part w-25 d-flex align-items-center justify-content-center">
                            <a href="" class="link-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                                </svg>
                            </a>
                        </div>
                       </div> 
                      </div>
                    </div>
                </div>
                <div class="card mb-3" style="max-width: 1000px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body d-flex justify-content-between">
                            <div class="left-part w-75">
                                <h5 class="card-title fw-bold">User Melvin</h5>
                                <p class="card-text">Fund Raised</p>
                                <div class="progress">
                                    <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                          <div class="right-part w-25 d-flex align-items-center justify-content-center">
                            <a href="" class="link-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                                </svg>
                            </a>
                        </div>
                       </div> 
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="notification-list bg-light rounded-3">
            <div class="notification-box">
                <div class="notification-list-text">
                    <h2>Activity Log</h2>
                </div>
            </div>
        </div>
    </div>
</section>   
@endsection
{{-- Dashboard admin untuk melihat data data yang ada di webnya, seperti jumlah user, jumlah penggalangan, dll --}}
