@extends('layouts.user')
@section('title')
    Funding List
@endsection
@section('cssName')
    fund
@endsection
@section('jsName')
    fund
@endsection
@section('content')
    <section class="container-color">
        <div class="container pb-5">
            <div class="row">
                <div class="col py-5">
                    <h1>Funding List</h1>
                </div>
            </div>
            <div class="row pb-3">
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
                                placeholder="Movie Project..." data-search-url="{{ route('search.funds') }}">
                        </div>
                    </form>
                </div>
            </div>
            <div class="fund-container">
                @foreach ($data as $funding)
                    <div class="row py-2 fund-item" data-name="{{ strtolower($funding->name) }}"
                        data-category="{{ strtolower($funding->category->catName) }}">
                        <div class="col">
                            <form action="" class="d-flex justify-content-center align-items-center p-4 w-75">
                                <div class="container">
                                    <div class="row datarow">
                                        <div class="col">
                                            <img src="{{ $funding->fundDetail->first()->imageOrVideo ? asset('uploads/' . $funding->fundDetail->first()->imageOrVideo) : asset('img/LogoFund4Future.png') }}"
                                                alt="Fund Image" class="fundimage">
                                        </div>
                                        <div class="col col-l">
                                            <h5>{{ $funding->name }}</h5>
                                            <p>{{ $funding->description }}</p>
                                            <span
                                                class="border border-success border-2 rounded-1 px-2">{{ $funding->category->catName }}</span>
                                            <span>Funding Progress</span>
                                            <span>{{ $funding->currAmount }} / {{ $funding->targetAmount }}</span>
                                        </div>
                                        <div class="col">
                                            <a href="{{ route('fund.show', $funding->id) }}"
                                                class="btn btn-success primary-background">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row pagination-container">
                <div class="col">
                    {{ $data->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>
@endsection
