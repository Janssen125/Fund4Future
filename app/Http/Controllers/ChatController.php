<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\ChatDetail;
use Illuminate\Support\Facades\Storage;
use Google\Client;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;
use Google\Service\Drive\Permission;
use Illuminate\Support\Facades\Log;

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
    public function store(Request $request, GoogleClientController $google)
    {
        try{
        $request->validate([
            'chat_id' => 'required|exists:chats,id',
            'message' => 'required|string|max:1000',
            'attachment' => 'nullable|file|mimes:jpeg,png,jpg,webp,mp4,mov,avi,webm,pdf,zip,rar|max:20480',
        ]);
    }    catch(\Exception $e){
        return redirect()->back()->with('error', $e->getMessage());
    }

        $attachmentUrl = null;
        $attachmentType = null;
        $attachmentSize = null;
        $attachmentName = null;

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $fileExtension = strtolower($file->getClientOriginalExtension());

            // Determine file type
            $allowedTypes = [
                'jpeg' => 'image',
                'jpg' => 'image',
                'png' => 'image',
                'webp' => 'image',
                'mp4' => 'video',
                'mov' => 'video',
                'avi' => 'video',
                'webm' => 'video',
                'pdf' => 'pdf',
                'zip' => 'zip',
                'rar' => 'zip'
            ];

            $attachmentType = $allowedTypes[$fileExtension] ?? null;

            if (!$attachmentType) {
                return redirect()->back()->with('message', 'Invalid file type. Allowed types are: image, video, pdf, zip.');
            }

            try {
                $attachmentUrl = $google->uploadToDrive($file);
            } catch(\Exception $e) {
                Log::error('File Failed' . $e->getMessage());
                return redirect()->back()->with('message', 'Invalid File');
            }

            $attachmentSize = round($file->getSize() / 1024, 2) . ' KB';
            $attachmentName = $file->getClientOriginalName();
        }

        // Save chat message
        ChatDetail::create([
            'chat_id' => $request->chat_id,
            'sender_id' => auth()->id(),
            'message' => $request->message,
            'type' => $attachmentType ?? 'text',
            'attachment' => $attachmentUrl,
            'attachment_type' => $attachmentType,
            'attachment_size' => $attachmentSize,
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
        $chat = Chat::with('chatDetails', 'staff')->where('fund_id', $id)->firstOrFail();
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
        $chat = Chat::where('fund_id', $id)->firstOrFail();

        $chat->staff_id = auth()->id();
        $chat->save();

        return redirect()->route('chats.show', $id)->with('message', 'Chat assigned to you successfully!');
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

    public function changeStatus(Request $request, $id)
    {
        $chat = Chat::findOrFail($id);

        if ($chat->funder_id != auth()->id() && $chat->staff_id != auth()->id() && auth()->user()->role != 'admin') {
            return redirect()->route('home')->with('message', 'You are not authorized to change the status of this chat.');
        }

        if ($chat->fund) {
            $chat->fund->update(['approvalStatus' => $request->status]);
        }

        return redirect()->back()->with('message', 'Chat and fund status updated successfully!');
    }
}
