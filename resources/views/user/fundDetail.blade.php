@extends('layouts.user')
@section('title')
    Funding Detail
@endsection
@section('cssName')
    fund
@endsection
@section('content')
    <div class="container">
        <h2>{{ $data->name }}</h2>
        <p>{{ $data->description }}</p>
        <p><strong>Category:</strong> {{ $data->category->catName }}</p>
        <p><strong>Funding Progress:</strong> {{ $data->currAmount }} / {{ $data->targetAmount }}</p>

        <h3>Gallery</h3>
        <div class="row">
            @foreach ($data->fundDetail as $detail)
                <div class="col-md-4">
                    @if ($detail->types === 'video')
                        <video width="100%" controls>
                            <source src="{{ asset('uploads/' . $detail->imageOrVideo) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @else
                        <img src="{{ asset('uploads/' . $detail->imageOrVideo) }}" class="img-fluid" alt="Fund Image">
                    @endif
                </div>
            @endforeach
        </div>

        <a href="{{ route('fund.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection

{{-- Halaman untuk Fund Detail user, user bisa lihat penggalangan ini dengan lebih detail dan bisa melakukan pendanaan disini --}}
