@extends('layouts.admin')
@section('title')
    Create Category
@endsection
@section('cssName')
    admindashboard
@endsection
@section('content')
    <div>
        <h1 class="p-5">Category</h1>
    </div>
    <div class="container  justify-content-start">
        <div class="row p-5">
            <div class="col col-l">
                <form class="card px-5 py-3" action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="py-4">
                        <h2>Create Category</h2>
                    </div>
                    <div class="mb-3 w-100">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="name">
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
