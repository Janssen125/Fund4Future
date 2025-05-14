@extends('layouts.user')
@section('title')
    Chat
@endsection
@section('cssName')
    chat
@endsection
@section('content')
    {{-- Masukkin disini  --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Chat</h1>
                <div id="chat-container">
                    <div id="messages"></div>
                    <input type="text" id="message-input" placeholder="Type a message...">
                    <button id="send-button">Send</button>
                </div>
            </div>
        </div>
    @endsection
