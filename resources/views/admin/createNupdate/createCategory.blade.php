@extends('layouts.admin')
@section('title')
    Create Category
@endsection
@section('cssName')
    admindashboard
@endsection
@section('content')
<section class="create-category">
    <div class=" card form-container d-flex justify-content-center align-items-center w-25 p-5">
        <form>
            <div class="header-container py-2">
                <h2>Create Category</h2>
            </div>
            <div class="mb-3 w-100">
                <label for="exampleInputEmail1" class="form-label">Category Name</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 w-100">
                <label for="exampleInputPassword1" class="form-label">Category Keyword</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="d-flex justify-content-center py-3 w-100">
                <button type="submit" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>
                    CREATE
                </button>
            </div>
            
        </form>
    </div>
</section>

@endsection