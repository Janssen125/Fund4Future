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
                'mp4' => 'video',
                'pdf' => 'pdf',
                'zip' => 'zip',
            ];

            $attachmentType = $allowedTypes[$fileExtension] ?? null;

            if (!$attachmentType) {
                return redirect()->back()->with('message', 'Invalid file type. Allowed types are: image, video, pdf, zip.');
            }

            // Initialize Google Client
            $client = new Client();
            $client->setClientId(env('GOOGLE_CLIENT_ID'));
            $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
            $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
            $client->setAccessType('offline');
            $client->setPrompt('select_account consent');
            $client->addScope([
                'https://www.googleapis.com/auth/drive.file',
                'https://www.googleapis.com/auth/gmail.send',
            ]);

            // Use your refresh token
            $client->refreshToken(env('GOOGLE_REFRESH_TOKEN'));
            $accessToken = $client->getAccessToken();

            if (!isset($accessToken['access_token'])) {
                throw new \Exception('Failed to retrieve access token using refresh token.');
            }

            // Upload to Drive
            $service = new Drive($client);

            $folderName = "Fund4Future";
            $folderId = null;
            $existingFolder = $service->files->listFiles([
                'q' => "name='{$folderName}' and mimeType='application/vnd.google-apps.folder' and trashed=false",
                'fields' => 'files(id, name)',
            ]);

            if (count($existingFolder->files) > 0) {
                $folderId = $existingFolder->getFiles()[0]->id;
            } else {
                $folderMetadata = new DriveFile([
                    'name' => $folderName,
                    'mimeType' => 'application/vnd.google-apps.folder',
                ]);
                $folder = $service->files->create($folderMetadata, [
                    'fields' => 'id',
                ]);
                $folderId = $folder->id;
            }

            $driveFile = new DriveFile([
                'name' => $file->getClientOriginalName(),
                'mimeType' => $file->getMimeType(),
                'parents' => [$folderId],
            ]);
            // $driveFile->setName($file->getClientOriginalName());
            // $driveFile->setMimeType($file->getMimeType());

            $createdFile = $service->files->create($driveFile, [
                'data' => file_get_contents($file->getRealPath()),
                'mimeType' => $file->getMimeType(),
                'uploadType' => 'multipart',
            ]);

            // Make public
            $permission = new Permission();
            $permission->setType('anyone');
            $permission->setRole('reader');
            $service->permissions->create($createdFile->id, $permission);

            if ($attachmentType === 'image') {
                // Show as image thumbnail
                $attachmentUrl = "https://drive.google.com/thumbnail?id={$createdFile->id}&export=view";
            } elseif ($attachmentType === 'pdf') {
                // Use Google Drive preview URL (opens in Drive viewer)
                $attachmentUrl = "https://drive.google.com/file/d/{$createdFile->id}/view";
            } elseif ($attachmentType === 'video') {
                // Use Drive video preview
                $attachmentUrl = "https://drive.google.com/file/d/{$createdFile->id}/preview";
            } else {
                // Fallback: direct file view/download
                $attachmentUrl = "https://drive.google.com/uc?export=view&id={$createdFile->id}";
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
