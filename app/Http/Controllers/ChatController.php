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

            // Store the file in the 'attachments' directory
            $attachmentPath = $file->store('attachments', 'public');

            // Get the file extension
            $fileExtension = strtolower($file->getClientOriginalExtension());

            // Map the file extension to the allowed attachment types
            $allowedTypes = [
                'jpeg' => 'image',
                'jpg' => 'image',
                'png' => 'image',
                'mp4' => 'video',
                'pdf' => 'pdf',
                'zip' => 'zip',
            ];

            $attachmentType = $allowedTypes[$fileExtension] ?? null;

            // Ensure the attachment type is valid
            if (!$attachmentType) {
                return redirect()->back()->with('message', 'Invalid file type. Allowed types are: image, video, pdf, zip.');
            }

            // Get additional file details
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
        if(!($chat->funder_id == auth()->id() || $chat->staff_id == auth()->id())) {
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
