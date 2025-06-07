@extends('layouts.admin')
@section('title')
    Mail Details
@endsection
@section('cssName')
    admindashboard
@endsection
@section('content')
    <div>
        <h1 class="p-5">
            Mail
        </h1>
    </div>
    <div class="container">
        <h3 class="text-center mb-4">Mail Detail</h3>
        <div class="row">
            <div class="col">
                <div class="container border rounded p-4 justify-content-start align-items-start">
                    <div class="row row-l mb-3">
                        <div class="col col-l col-4">
                            <p><strong>From:</strong> {{ $mail->user->name }}</p>
                        </div>
                        <div class="col col-l col-4">
                            <p><strong>Date:</strong> {{ $mail->created_at->format('F d, Y') }}</p>
                            <p><strong>Time:</strong> {{ $mail->created_at->format('h:i A') }}</p>
                        </div>
                        <div class="col col-l col-4">
                            <p><strong>Sender Email:</strong> {{ $mail->user->email }}</p>
                        </div>
                    </div>

                    <div class="row row-l mb-3">
                        <div class="col col-l">
                            <p><strong>Subject:</strong> {{ $mail->title }}</p>
                        </div>
                    </div>

                    <div class="row row-l">
                        <div class="col col-l">
                            <p><strong>Message:</strong></p>
                            <div class="border rounded p-3 bg-light">
                                {{ $mail->content }}
                            </div>
                        </div>
                    </div>

                    <div class="row row-l mt-4">
                        <div class="col col-l text-end">
                            <form action="{{ route('mail.destroy', $mail->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container border rounded p-4">
                    <h4 class="text-center mb-3">Reply to Mail</h4>
                    <form action="{{ route('mail.reply', $mail->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="replyTitle" class="form-label">Title / Subject</label>
                            <textarea class="form-control" id="replyTitle" name="title" rows="5" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="replyContent" class="form-label">Content</label>
                            <textarea class="form-control" id="replyContent" name="content" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Send Reply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
