@extends('layouts.admin')
@section('title')
    Category List
@endsection
@section('cssName')
    admindashboard
@endsection
@section('content')
    <div class="row w-100">
        <div class="col col-l">
            <h1 class="p-5">
                Category
            </h1>
        </div>
        <div class="col col-r justify-content-center">
            <a href="{{ route('category.create') }}" class="btn btn-primary mb-3 mx-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4-1h-3V4a1 1 0 0 0-2 0v3H4a1 1 0 0 0 0 2h3v3a1 1 0 0 0 2 0V9h3a1 1 0 0 0 0-2z" />
                </svg>
                Add Category
            </a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <table id="categoryTable">
                    <thead>
                        <tr>
                            <th scope="col" style="background-color: #00A9A5; color: white;">No</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">Category Name</th>
                            <th scope="col" style="background-color: #00A9A5; color: white;">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $index => $category)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $category->catName }}</td>
                                <td>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ route('category.edit', $category->id) }}" title="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="rgb(0, 169, 165)" class="bi bi-pencil-square"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-link p-0" title="Delete"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal-{{ $category->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#dc3545" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 1a1 1 0 0 0-1 1v1h13V2a1 1 0 0 0-1-1H2.5zM1.5 4a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 .5.5v9a2 2 0 0 1-2 2h-9a2 2 0 0 1-2-2V4z" />
                                                    </svg>
                                                </button>
                                                <div class="modal fade" id="deleteModal-{{ $category->id }}" tabindex="-1"
                                                    aria-labelledby="deleteModalLabel-{{ $category->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="deleteModalLabel-{{ $category->id }}">Confirm Delete
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete the category
                                                                <strong>{{ $category->name }}</strong>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <form
                                                                    action="{{ route('category.destroy', $category->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#categoryTable').DataTable({
                paging: true, // Enable pagination
                searching: true, // Enable search
                ordering: true, // Enable column sorting
                info: true, // Show table information
                lengthChange: true, // Allow changing the number of rows displayed
                pageLength: 10, // Default number of rows per page
            });
        });
    </script>
@endsection
{{-- Halaman ini untuk mengatur kategori penggalangan dana, kayaknya admin only ini --}}
