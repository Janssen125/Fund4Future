@extends('layouts.admin')
@section('title')
    Notification
@endsection
@section('cssName')
adminnotification
@endsection
@section('jsName')
admin/deleteNotification
@endsection

@section('content')
<section class="notification-background d-flex justify-content-center align-item-center" style="background-color: #00A9A5;">
    <div class="notification-box w-75 vh-125 bg-light d-flex justify-content-center rounded-3">
        <div class="card-list">
            <div class="top-part d-flex mt-4">
                <h1>Notifications</h1>
                <button type="button" class="delete-btn btn btn-outline-danger ms-5">Delete</button>
            </div> 
            <!-- Cards -->
            <div class="my-card card my-4 d-flex flex-row align-items-center" style="width: 60rem;">
                <button type="button" class=" deleteOption btn btn-danger">Delete</button>
                <div class="ms-5">
                    <img src="" alt="">
                </div>
                <div class="card-body d-flex justify-content-around align-items-center">  
                    <div class="admin-identity">
                        <h5 class="admin-name">Admin123</h5>
                        <p>Administrator</p>
                    </div>                  
                    <div class="title-container">
                        <p class="title">This is title</p>
                    </div>
                    <div class="details-container">
                        <p class="detail">This is details</p>
                    </div>
                    <div class="date-time">
                        <p class="date">April 21, 2023</p>
                        <p class="time">10:12 AM</p>
                    </div>
                </div>
            </div>
            <div class="my-card card my-4 d-flex flex-row align-items-center" style="width: 60rem;">
                <button type="button" class=" deleteOption btn btn-danger">Delete</button>
                <div class="ms-5">
                    <img src="" alt="">
                </div>
                <div class="card-body d-flex justify-content-around align-items-center">  
                    <div class="admin-identity">
                        <h5 class="admin-name">Admin123</h5>
                        <p>Administrator</p>
                    </div>                  
                    <div class="title-container">
                        <p class="title">This is title</p>
                    </div>
                    <div class="details-container">
                        <p class="detail">This is details</p>
                    </div>
                    <div class="date-time">
                        <p class="date">April 21, 2023</p>
                        <p class="time">10:12 AM</p>
                    </div>
                </div>
            </div>
            <div class="my-card card my-4 d-flex flex-row align-items-center" style="width: 60rem;">
                <button type="button" class=" deleteOption btn btn-danger">Delete</button>
                <div class="ms-5">
                    <img src="" alt="">
                </div>
                <div class="card-body d-flex justify-content-around align-items-center">  
                    <div class="admin-identity">
                        <h5 class="admin-name">Admin123</h5>
                        <p>Administrator</p>
                    </div>                  
                    <div class="title-container">
                        <p class="title">This is title</p>
                    </div>
                    <div class="details-container">
                        <p class="detail">This is details</p>
                    </div>
                    <div class="date-time">
                        <p class="date">April 21, 2023</p>
                        <p class="time">10:12 AM</p>
                    </div>
                </div>
            </div>
            
            
             <div class="pagination d-flex justify-content-center py-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#00A9A5" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
                </svg>
                <h2 class="px-5">1</h2>
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#00A9A5" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                    <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1"/>
                </svg>
             </div>
        </div>
    </div>
</section>
@endsection