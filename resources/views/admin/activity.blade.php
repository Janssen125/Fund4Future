@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('cssName')
admindashboard
@endsection
@section('jsName')
admin/navbar
@endsection

@section('content')
<section class="activity-background d-flex justify-content-center align-item-center bg-primary">
    <div class="activity-box w-75 vh-125 bg-danger d-flex justify-content-center ">
        <div class="card-list">
            <div class="top-part d-flex">
                <h1>Activity Log</h1>
                <button type="button" class="btn btn-outline-primary">EDIT</button>
            </div> 
            <div class="card" style="width: 60rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">                    
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card" style="width: 60rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">                    
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card" style="width: 60rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">                    
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card" style="width: 60rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">                    
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
             <div class="pagination d-flex justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#CCEEED" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="snow" class="bi bi-1-square-fill" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm7.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#CCEEED" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                    <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1"/>
                </svg>
             </div>
        </div>
    </div>
</section>
@endsection