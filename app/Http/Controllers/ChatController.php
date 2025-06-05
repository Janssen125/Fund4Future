<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\ChatDetail;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'chat_id' => 'required|exists:chats,id',
            'message' => 'required|string|max:1000',
            'attachment' => 'nullable|file|mimes:jpeg,png,jpg,mp4,pdf,zip|max:20480',
        ]);

        $attachmentPath = null;
        $attachmentType = null;
        $attachmentSize = null;
        $attachmentName = null;

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');

            $attachmentPath = $file->store('attachments', 'public');

            $fileExtension = strtolower($file->getClientOriginalExtension());

            $allowedTypes = [
                'jpeg' => 'image',
                'jpg' => 'image',
                'png' => 'image',
                'mp4' => 'video',
                'pdf' => 'pdf',
                'zip' => 'zip',
            ];

            $attachmentType = $allowedTypes[$fileExtension] ?? null;

            if (!$attachmentType) {
                return redirect()->back()->with('message', 'Invalid file type. Allowed types are: image, video, pdf, zip.');
            }

            $attachmentSize = $file->getSize();
            $attachmentName = $file->getClientOriginalName();
        }

        // Create a new chat detail
        ChatDetail::create([
            'chat_id' => $request->chat_id,
            'sender_id' => auth()->id(),
            'message' => $request->message,
            'type' => $attachmentType ?? 'text', // Use 'text' if no attachment
            'attachment' => $attachmentPath ?? null,
            'attachment_type' => $attachmentType,
            'attachment_size' => $attachmentSize ? round($attachmentSize / 1024, 2) . ' KB' : null, // Convert size to KB
            'attachment_name' => $attachmentName,
        ]);

        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chat = Chat::with('chatDetails', 'staff')->where('fund_id', $id)->findOrFail($id);
        if(!($chat->funder_id == auth()->id() || $chat->staff_id == auth()->id() || auth()->user()->role == 'admin')) {
            return redirect()->route('home')->with('message', 'You are not authorized to view this chat.');
        }
        return view('user.chat', compact('chat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chat = Chat::findOrFail($id);

        $chat->staff_id = auth()->id();
        $chat->save();

        return redirect()->route('chat.show', $chat->id)->with('message', 'Chat assigned to you successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $chat = Chat::findOrFail($id);
        if ($chat->funder_id != auth()->id() && $chat->staff_id != auth()->id() && auth()->user()->role != 'admin') {
            return redirect()->route('home')->with('message', 'You are not authorized to update this chat.');
        }

        $chat->update(['status' => 'ended']);

        return redirect()->back()->with('message', 'Chat closed successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $chat = Chat::findOrFail($id);
        // if ($chat->funder_id != auth()->id() && $chat->staff_id != auth()->id() && auth()->user()->role != 'admin') {
        //     return redirect()->route('home')->with('message', 'You are not authorized to delete this chat.');
        // }

        // $chat->delete();

        // return redirect()->back()->with('message', 'Chat deleted successfully!');
    }
}
