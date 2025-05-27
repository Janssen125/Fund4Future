@extends('layouts.admin')
@section('title')
    Update Category
@endsection
@section('cssName')
    admindashboard
@endsection
@section('content')
<section class="update-category">
    <div class=" card form-container d-flex justify-content-center align-items-center w-50 p-5">
        <form>
            <div class="header-container py-2 d-flex justify-content-center">
                <h2>Update Category</h2>
            </div>
            <div class="input-container d-flex">
                <div class="left-side px-4">
                    <div class="mb-3 w-100">
                        <label for="exampleInputEmail1" class="form-label">Previous Category Name</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 w-100">
                        <label for="exampleInputPassword1" class="form-label">Previous Category Keyword</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                </div>

                <div class="right-side">
                    <div class="mb-3 w-100">
                        <label for="exampleInputEmail1" class="form-label">New Category Name</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 w-100">
                        <label for="exampleInputPassword1" class="form-label">New Category Keyword</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-center py-3 w-100">
                <button type="submit" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                    </svg>
                    UPDATE
                </button>
            </div>
            
        </form>
    </div>
</section>

@endsection