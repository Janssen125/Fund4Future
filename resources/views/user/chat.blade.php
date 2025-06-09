@extends('layouts.user')
@section('title')
    Chat
@endsection
@section('cssName')
    chat
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row align-items-start justify-content-start py-5">
                <div class="col col-l">
                    <div class="row w-50 pb-5">
                        @if (auth()->user()->role != 'user')
                            <div class="col col-l">
                                <a href="{{ route('admin.ticketing') }}" class="btn btn-secondary">Back to Chats</a>
                            </div>
                        @else
                            <div class="col col-l">
                                <a href="{{ route('profileFundingList') }}" class="btn btn-secondary">Back to Chats</a>
                            </div>
                        @endif
                    </div>
                    <div class="row w-50">
                        @if ($chat->staff_id == null)
                            <div class="col col-l">
                                <img src="{{ asset('img/LogoFund4Future.png') }}" width=40 height=40 alt="">
                            </div>
                            <div class="col col-l">
                                Waiting For Staff...
                            </div>
                        @else
                            <div class="col col-l">
                                @if ($chat->staff->userImg == 'AssetUser.png' || $chat->staff->userImg == 'AssetAdmin.png')
                                    <img src="{{ asset('img/' . $chat->staff->userImg) }}" alt="profile picture"
                                        width="40" height="40">
                                @else
                                    <img src="{{ asset('storage/img/' . $chat->staff->userImg) }}" width=40 height=40
                                        alt="">
                                @endif
                            </div>
                            <div class="col col-l">
                                <b>{{ $chat->staff->name }}</b>
                            </div>
                        @endif
                    </div>
                    <div class="row py-3">
                        <div class="col col-l">
                            Created at: {{ $chat->created_at }}
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col col-l">
                            <span>
                                <b>Chat ID: </b>
                                {{ $chat->id }}
                            </span>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col col-l">
                            <span>
                                <b>Status: </b>
                                {{ $chat->fund->approvalStatus }}
                            </span>
                        </div>
                    </div>
                    @if (auth()->check() && auth()->user()->role != 'user')
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('chats.changeStatus', $chat->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Change Status</label>
                                        <select name="status" id="status" class="form-select">
                                            <option value="pending"
                                                {{ $chat->fund->approvalStatus == 'pending' ? 'selected' : '' }}>Pending
                                            </option>
                                            <option value="approved"
                                                {{ $chat->fund->approvalStatus == 'approved' ? 'selected' : '' }}>Approved
                                            </option>
                                            <option value="declined"
                                                {{ $chat->fund->approvalStatus == 'declined' ? 'selected' : '' }}>Declined
                                            </option>
                                            <option value="finished"
                                                {{ $chat->fund->approvalStatus == 'finished' ? 'selected' : '' }}>Finished
                                            </option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Status</button>
                                </form>
                            </div>
                        </div>
                        <div class="row py-3">
                            <div class="col col-l">
                                <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                    data-bs-target="#updateModal-{{ $chat->id }}">Close this chat</button>
                            </div>
                        </div>
                    @endif
                    <hr class="w-100">
                    <div class="row py-3">
                        <div class="col col-l">
                            Attachments:
                        </div>
                    </div>
                    {{ $hasAttachment = false }}
                    @foreach ($chat->chatDetails as $detail)
                        @if ($detail->attachment)
                            <div class="row py-3">
                                <div class="col col-l mb-3">
                                    <p><strong>Description:</strong> {{ $detail->message }}</p>
                                    <p><strong>Type:</strong> {{ ucfirst($detail->type) }}</p>
                                    <p><strong>Attachment:</strong></p>
                                    @if (in_array($detail->type, ['image', 'video']))
                                        <a href="{{ asset($detail->attachment) }}" target="_blank">
                                            @if ($detail->type == 'image')
                                                @if (
                                                    $detail->attachment_name == 'example.jpg' ||
                                                        $detail->attachment_name == 'example.png' ||
                                                        $detail->attachment_name == 'example.jpeg')
                                                    <img src="{{ asset($detail->attachment) }}" alt="Attachment"
                                                        class="img-thumbnail" style="max-width: 200px;">
                                                @else
                                                    <img src="{{ asset('storage/' . $detail->attachment) }}"
                                                        alt="Attachment" class="img-thumbnail" style="max-width: 200px;">
                                                @endif
                                            @elseif ($detail->type == 'video')
                                                @if ($detail->attachment_name == 'example.mp4')
                                                    <video controls style="max-width: 200px;">
                                                        <source src="{{ asset($detail->attachment) }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @else
                                                    <video controls style="max-width: 200px;">
                                                        <source src="{{ asset('storage/' . $detail->attachment) }}"
                                                            type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @endif
                                            @endif
                                        </a>
                                    @elseif($detail->type == 'pdf')
                                        @if ($detail->attachment_name == 'example.pdf')
                                            <a href="{{ asset($detail->attachment) }}" target="_blank">Download PDF</a>
                                        @else
                                            <a href="{{ asset('storage/' . $detail->attachment) }}"
                                                target="_blank">Download File</a>
                                        @endif
                                    @elseif($detail->type == 'zip')
                                        @if ($detail->attachment_name == 'example.zip')
                                            <a href="{{ asset($detail->attachment) }}" target="_blank">Download ZIP</a>
                                        @else
                                            <a href="{{ asset('storage/' . $detail->attachment) }}"
                                                target="_blank">Download File</a>
                                        @endif
                                    @endif
                                </div>
                                <?php $hasAttachment = true; ?>
                                <hr>
                            </div>
                        @endif
                    @endforeach
                    @if ($hasAttachment == false)
                        <div class="col col-l mb-3">
                            <p>No attachments found.</p>
                        </div>
                    @endif
                </div>
                <div class="col">
                    @foreach ($chat->chatDetails as $detail)
                        <div class="container py-3">
                            <div class="row">
                                <div class="col col-1">
                                    @if ($detail->sender->userImg == 'AssetUser.png' || $detail->sender->userImg == 'AssetAdmin.png')
                                        <img src="{{ asset('img/' . $detail->sender->userImg) }}" alt="profile picture"
                                            width="40" height="40">
                                    @else
                                        <img src="{{ $detail->sender->userImg ? asset('storage/img/' . $detail->sender->userImg) : asset('img/LogoFund4Future.png') }}"
                                            width=40 height=40 alt="Profile Picture">
                                    @endif
                                </div>
                                <div class="col col-11 col-l">
                                    <div class="row w-100">
                                        <div class="col col-l">
                                            <b>{{ $detail->sender->name }}</b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-l">
                                            {{ $detail->created_at->format('F d, Y \a\t h:i A') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-l py-4">
                                    {{ $detail->message }}
                                </div>
                            </div>
                            <hr>
                        </div>
                    @endforeach
                    @if ($chat->status == 'ended')
                        <div class="container py-3">
                            <div class="row">
                                <div class="col col-12">
                                    <p class="text-danger">This chat has been closed.</p>
                                    <p>Contact us if there is any error or questions.</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="container py-3">
                            <div class="row align-items-start">
                                <div class="col col-1">
                                    @if (auth()->user()->userImg == 'AssetUser.png' || auth()->user()->userImg == 'AssetAdmin.png')
                                        <img src="{{ asset('img/' . auth()->user()->userImg) }}" alt="profile picture"
                                            width="40" height="40">
                                    @else
                                        <img src="{{ auth()->user()->userImg ? asset('storage/img/' . auth()->user()->userImg) : asset('img/LogoFund4Future.png') }}"
                                            width="40" height="40" alt="Profile Picture">
                                    @endif
                                </div>
                                <div class="col col-11">
                                    <form action="{{ route('chats.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="chat_id" value="{{ $chat->id }}">
                                        <div class="mb-3">
                                            <textarea name="message" class="form-control" placeholder="Insert New Message" rows="3" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="attachment" class="form-label">Upload File (Image (.jpg, .jpeg,
                                                .png),
                                                Video (mp4), PDF,
                                                ZIP)</label>
                                            <input type="file" name="attachment" id="attachment" class="form-control"
                                                accept="image/*,video/*,.pdf,.zip">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="modal fade" id="updateModal-{{ $chat->id }}" tabindex="-1"
            aria-labelledby="updateModalLabel-{{ $chat->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel-{{ $chat->id }}">Confirm Finish</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to close this chat?
                        <br>
                        <span style="color: red;">This action can't be reversed</span>
                        <strong>{{ $chat->name }}</strong>
                    </div>
                    <div class="modal-footer w-100">
                        <form action="{{ route('chats.update', $chat->id) }}" method="POST"
                            class="justify-content-end align-items-end d-flex">
                            @csrf
                            @method('PUT')
                            <button type="button" class="btn btn-secondary mx-3" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Finish Chat</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
