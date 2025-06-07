@extends('layouts.admin')
@section('title')
    Mail List
@endsection
@section('content')
    <div class="container">
        <h1 class="p-5">Mail List</h1>
        <div class="container">
            <h3 class="text-center py-3">New Mails</h3>
            @forelse ($mails as $mail)
                <div class="container border rounded p-3 mb-3 w-75">
                    <div class="row w-100">
                        <div class="col col-3 col-l">
                            <p>Subject: <b>{{ Str::limit($mail->title, 10, '...') }}</b></p>
                        </div>
                        <div class="col col-3 col-l">
                            <p>Message: <b>{{ Str::limit($mail->content, 20, '...') }}</b></p>
                        </div>
                        <div class="col col-3 col-l">
                            <p>{{ $mail->created_at->format('F d, Y') }}</p>
                            <p>{{ $mail->created_at->format('h:i A') }}</p>
                        </div>
                        <div class="col col-3 col-l text-end">
                            <a href="{{ route('mail.show', $mail->id) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No new mails.</p>
            @endforelse
        </div>
    </div>
@endsection

{{-- Halaman untuk daftar pesan dari contact us, bisa Create, Read, Update. Delete cuma bisa si Admin --}}
