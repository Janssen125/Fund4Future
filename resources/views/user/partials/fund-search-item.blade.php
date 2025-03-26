@if ($data->isEmpty())
    <div class="row show">
        <div class="col show">
            <div class="alert alert-info w-50 text-info show">
                No Data Found
            </div>
        </div>
    </div>
@endif

@foreach ($data as $funding)
    <div class="row py-2 fund-item show" data-name="{{ strtolower($funding->name) }}"
        data-category="{{ strtolower($funding->category->catName) }}">
        <div class="col show">
            <form action="" class="d-flex justify-content-center align-items-center p-4 w-75">
                <div class="container show">
                    <div class="row datarow show">
                        <div class="col show">
                            <img src="{{ asset('img/LogoFund4Future.png') }}" alt="Pic" width=70 height=70>
                        </div>
                        <div class="col col-l show">
                            <h5>{{ $funding->name }}</h5>
                            <p>{{ $funding->description }}</p>
                            <span class="border border-success border-2 rounded-1 px-2">
                                {{ $funding->category->catName }}
                            </span>
                            <span>Funding Progress</span>
                            <span>{{ $funding->currAmount }} / {{ $funding->targetAmount }}</span>
                        </div>
                        <div class="col show">
                            <a href="" class="btn btn-success primary-background">Details</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endforeach
