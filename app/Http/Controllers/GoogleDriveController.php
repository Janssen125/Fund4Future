<?php

namespace App\Http\Controllers;

use Google\Client as GoogleClient;
use Google\Service\Drive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GoogleDriveController extends Controller
{
    private $client;
    private $driveService;

    public function __construct()
    {
        $this->client = new GoogleClient();
        $this->client->setClientId(env('GOOGLE_CLIENT_ID'));
        $this->client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $this->client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $this->client->setAccessType('offline');
        $this->client->setScopes([
            Drive::DRIVE_FILE, // only allows managing files created by your app
        ]);

        $this->client->setAccessToken($this->client->fetchAccessTokenWithRefreshToken(env('GOOGLE_REFRESH_TOKEN')));
        $this->driveService = new Drive($this->client);
    }

    // Upload file to Google Drive
    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // 10 MB max
        ]);

        $file = $request->file('file');
        $fileMetadata = new Drive\DriveFile([
            'name' => $file->getClientOriginalName(),
        ]);

        $uploadedFile = $this->driveService->files->create($fileMetadata, [
            'data' => file_get_contents($file->getRealPath()),
            'mimeType' => $file->getMimeType(),
            'uploadType' => 'multipart',
        ]);

        // Make file public
        $this->driveService->permissions->create($uploadedFile->id, new Drive\Permission([
            'type' => 'anyone',
            'role' => 'reader'
        ]));

        $publicUrl = "https://drive.google.com/uc?id={$uploadedFile->id}&export=view";

        return response()->json([
            'message' => 'File uploaded successfully',
            'file_id' => $uploadedFile->id,
            'public_url' => $publicUrl,
        ]);
    }

    // List uploaded files
    public function listFiles()
    {
        $files = $this->driveService->files->listFiles([
            'pageSize' => 10,
            'fields' => 'files(id, name, webViewLink)',
        ]);

        return response()->json($files->getFiles());
    }
}
