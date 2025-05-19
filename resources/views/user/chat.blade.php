@extends('layouts.user')
@section('title')
    chat
    @endsection
@section('cssName')
    chat
    @endsection
@section('content')
<section>
    <div class="container dvh-100">
        <div class="row align-items-start justify-content-start py-5">
            <div class="col col-l">
                <!-- {{-- Header --}}
                <div class="flex justify-between items-center bg-teal-500 p-4 rounded-t-md">
        <h2 class=" font-semibold">Category of request</h2>
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 bg-white rounded-full text-black flex justify-center items-center text-sm">👤</div>
                <div>
                    <div class="text-sm font-semibold">banana man</div>
                    <div class="text-xs">LAST ONLINE 11:30</div>
                </div>
            </div>
            <button class="bg-white text-black font-semibold py-1 px-3 rounded">END CHAT</button>
            <div class="w-6 h-6 bg-black text-white rounded-full flex justify-center items-center">🔔</div>
        </div> -->
        <div class="row">
            <div class="col col-l">
                <h2>Chat</h2>
            </div>
        </div>
        <div class="row w-50">
            <div class="col col-l">
                <img src="{{ asset('img/LogoFund4Future.png') }}" width=40 height=40 alt="">
            </div>
            <div class="col col-l">
                ABCD1234 Banana Man
            </div>
        </div>
        <div class="row">
            <div class="col col-l">
                Last Online: 11.40
            </div>
        </div>
        <div class="row w-50">
            <div class="col col-l">
                End Chat
            </div>
            <div class="col col-l">
                Logo Bell
            </div>
        </div>
        <div class="row pt-5">
            <div class="col col-l">
                <span>
                    <b>Ticket ID: </b>
                    12345
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col col-l">
                <span>
                    <b>Status: </b>
                    Pending
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col col-l">
                Documentation:
            </div>
        </div>
        <div class="row">
            <div class="col col-l">
                <img src="{{ asset('img/LogoFund4Future.png') }}" width=40 height=40 alt="">
            </div>
        </div>
    </div>
    <!-- {{-- Ticket Info --}}
    <div class="p-4">
        <p><strong>Ticket ID:</strong> 218543256</p>
        <p class="flex items-center gap-2 mt-2">
            <strong>Status:</strong> 
            <span class="bg-yellow-300 text-black px-2 py-1 rounded text-sm">Pending</span>
        </p>

        {{-- Documentation --}}
        <div class="mt-4">
            <p class="font-bold mb-2">Documentation:</p>
            <div class="space-y-2">
                <div class="w-24 h-28 bg-gray-200 border"></div>
                <div class="w-24 h-28 bg-gray-200 border"></div>
                <div class="w-24 h-28 bg-gray-200 border"></div>
            </div>
        </div>
    </div>
</div> -->
<div class="col">   
    {{-- Chat Area --}}
    <!-- <div class="p-4 space-y-4">
        {{-- Message from user --}}
        <div class="flex items-start gap-2">
            <div class="w-6 h-6 bg-gray-400 rounded-full">👤</div>
            <div>
                <div class="bg-cyan-100 p-2 rounded w-64">[Pesan dari user]</div>
                <div class="text-xs text-gray-500">READ 11:29</div>
            </div>
        </div>
        
        {{-- Message from admin --}}
        <div class="flex justify-end">
            <div>
                <div class="bg-cyan-100 p-2 rounded w-64">[Pesan dari admin]</div>
                <div class="text-xs text-gray-500 text-right">READ 11:29</div>
            </div>
        </div>

        {{-- Message from user --}}
        <div class="flex items-start gap-2">
            <div class="w-6 h-6 bg-gray-400 rounded-full">👤</div>
            <div>
                <div class="bg-cyan-100 p-2 rounded w-72">[Pesan lagi dari user]</div>
                <div class="text-xs text-gray-500">READ 11:29</div>
            </div>
        </div>
        
        {{-- Message from admin --}}
        <div class="flex justify-end">
            <div>
                <div class="bg-cyan-100 p-2 rounded w-72">[Pesan terakhir dari admin]</div>
                <div class="text-xs text-gray-500 text-right">DELIVERED 11:30</div>
            </div>
        </div>
    </div>

    {{-- Input Message --}}
    <div class="flex items-center gap-2 p-4 border-t">
        <button class="text-xl">🖼️</button>
        <input type="text" placeholder="Type your messages here..." class="flex-1 border px-3 py-2 rounded" />
        <button class="text-xl bg-teal-500 text-white px-4 py-2 rounded-full">➤</button>
    </div> -->
    <div class="container py-3">
        <div class="row">
            <div class="col col-1">
                <img src="{{ asset('img/LogoFund4Future.png') }}" width=40 height=40 alt="">
            </div>
            <div class="col col-11 col-l">
                <div class="row w-100">
                    <div class="col col-l">
                        <b>AB</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-l">
                        Mei 19, 2025 at 11.18 AM
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-l py-4">
                [Pesan dari AB]
            </div>
        </div>
        <hr>
    </div>
    <div class="container py-3">
        <div class="row">
            <div class="col col-1">
                <img src="{{ asset('img/LogoFund4Future.png') }}" width=40 height=40 alt="">
            </div>
            <div class="col col-11 col-l">
                <div class="row w-100">
                    <div class="col col-l">
                        <b>AB</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-l">
                        Mei 19, 2025 at 11.18 AM
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-l py-4">
                [Pesan dari AB]
            </div>
        </div>
        <hr>
    </div>
    <div class="container py-3">
        <div class="row">
            <div class="col col-1">
                <img src="{{ asset('img/LogoFund4Future.png') }}" width=40 height=40 alt="">
            </div>
            <div class="col col-11 col-l">
                <div class="row w-100">
                    <div class="col col-l">
                        <b>AB</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-l">
                        Mei 19, 2025 at 11.18 AM
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-l py-4">
                [Pesan dari AB]
            </div>
        </div>
        <hr>
    </div>
    <div class="containter">
        <div class="row">
            <div class="col">
                <input type="text" name="inputText" id="textId">
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary">submit</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>
@endsection
