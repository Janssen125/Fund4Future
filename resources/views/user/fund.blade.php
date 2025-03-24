@extends('layouts.user')
@section('title')
    Funding List
@endsection
@section('cssName')
    fund
@endsection
@section('content')
    <section class="container-color">
        <div class="container dvh-100">
            <div class="row py-5">
                <div class="col">
                    <form action="" class="d-flex justify-content-center align-items-center p-4 w-50">
                        <div class="pe-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#00a9a5"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </div>
                        <div class="w-100">
                            <input type="search" name="searchfund" class="w-100" id="searchbox"
                                placeholder="Movie Project...">
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col">

                </div>
            </div>
        </div>
    </section>
@endsection
{{-- Halaman untuk Funding List user, user bisa lihat daftar penggalangan dana yang sedang berlangsung --}}
