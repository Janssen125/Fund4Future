<?php

namespace App\Http\Controllers;

use App\Models\GoogleToken;
use Google\Client as GoogleClient;
use Google\Service\Drive;
use Google\Service\Gmail;
use Google\Service\Drive\DriveFile;
use Google\Service\Drive\Permission;
use Illuminate\Support\Facades\Log;

class GoogleClientController extends Controller
{
    // ======================================================================================
    //  GET GOOGLE CLIENT (for both Drive + Gmail)
    // ======================================================================================
    public function getClient()
    {
        $client = new GoogleClient();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->setAccessType('offline');
        $client->setPrompt('consent');

        // Both Gmail + Drive
        $client->setScopes([
            Drive::DRIVE_FILE,
            Gmail::GMAIL_SEND
        ]);

        $token = GoogleToken::first();

        if (!$token || !$token->refresh_token) {
            return redirect()->route('google.authorize');
        }

        // Inject token into Google Client
        $client->setAccessToken([
            'access_token' => $token->access_token,
            'refresh_token'=> $token->refresh_token,
            'expires_in'   => $token->expires_in,
            'created'      => $token->created,
        ]);

        // AUTO REFRESH
        if ($client->isAccessTokenExpired()) {
            try {
                $newToken = $client->fetchAccessTokenWithRefreshToken($token->refresh_token);

                if (isset($newToken['error'])) {
                    throw new \Exception($newToken['error_description'] ?? $newToken['error']);
                }

                $token->access_token = $newToken['access_token'];
                $token->expires_in   = $newToken['expires_in'];
                $token->save();

                $client->setAccessToken($newToken);

            } catch (\Exception $e) {
                Log::error('Google token refresh failed: ' . $e->getMessage());
                return redirect()->route('google.authorize');
            }
        }

        return $client;
    }

    // ======================================================================================
    //  STEP 1: REDIRECT USER TO GOOGLE OAUTH
    // ======================================================================================
    public function authorizeGoogle()
    {
        $client = new GoogleClient();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->setAccessType('offline');
        $client->setPrompt('consent');
        $client->setScopes([Drive::DRIVE_FILE, Gmail::GMAIL_SEND]);

        return redirect($client->createAuthUrl());
    }

    // ======================================================================================
    //  STEP 2: GOOGLE CALLBACK - SAVE TOKENS
    // ======================================================================================
    public function callback()
    {
        $client = new GoogleClient();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));

        $token = $client->fetchAccessTokenWithAuthCode(request('code'));

        // dd($token);

        if (isset($token['error'])) {
            return redirect()->route('google.authorize')
                ->with('error', 'Failed to authenticate Google.');
        }

        GoogleToken::updateOrCreate(
            ['service' => 'google'],
            [
                'access_token' => $token['access_token'],
                'refresh_token'=> $token['refresh_token'],
                'expires_in'   => $token['expires_in'],
                'created'      => $token['created'],
            ]
        );

        return redirect('/')->with('success', 'Google Connected Successfully!');
    }

    // ======================================================================================
    //  DRIVE UPLOAD (Controller Only Version)
    // ======================================================================================
    public function uploadToDrive($file)
    {
        $client = $this->getClient();
        $drive = new Drive($client);

        // Check Folder
        $folderName = "Fund4Future";
        $existing = $drive->files->listFiles([
            'q' => "name='{$folderName}' and mimeType='application/vnd.google-apps.folder' and trashed=false",
            'fields' => 'files(id)'
        ]);

        Log::info('Existing Folder: ' . json_encode($existing));

        if (count($existing->files)) {
            $folderId = $existing->files[0]->id;
        } else {
            // Create folder
            $folder = new DriveFile([
                'name' => $folderName,
                'mimeType' => 'application/vnd.google-apps.folder',
            ]);
            $createdFolder = $drive->files->create($folder, ['fields' => 'id']);
            $folderId = $createdFolder->id;
        }

        // Upload file
        $driveFile = new DriveFile([
            'name' => $file->getClientOriginalName(),
            'mimeType' => $file->getMimeType(),
            'parents' => [$folderId],
        ]);

        Log::info('Uploading File: ' . $file->getClientOriginalName());

        $uploaded = $drive->files->create($driveFile, [
            'data' => file_get_contents($file->getRealPath()),
            'mimeType' => $file->getMimeType(),
            'uploadType' => 'multipart',
            'fields' => 'id'
        ]);

        Log::info('Uploaded File ID: ' . $uploaded->id);

        // Public Permission
        $permission = new Permission();
        $permission->setType('anyone');
        $permission->setRole('reader');
        $drive->permissions->create($uploaded->id, $permission);

        Log::info('Permission set to public for File ID: ' . $uploaded->id);

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

        $fileType = $allowedTypes[strtolower($file->getClientOriginalExtension())] ?? null;

        Log::info('Determined file type: ' . $fileType);

        // Build Public URL
        if ($fileType === 'image') {
            return "https://drive.google.com/thumbnail?id={$uploaded->id}&export=view";
        }
        elseif($fileType === 'video') {
            return "https://drive.google.com/file/d/{$uploaded->id}/preview";
        }
        elseif($fileType === 'pdf') {
            return "https://drive.google.com/file/d/{$uploaded->id}/view";
        }
        elseif($fileType === 'zip') {
            return "https://drive.google.com/uc?export=view&id={$uploaded->id}";
        }
        return null;
    }

    // ======================================================================================
    //  GMAIL SEND EMAIL (Controller Only Version)
    // ======================================================================================
    public function sendEmail($to, $subject, $html)
    {
        $client = $this->getClient();
        $gmail = new Gmail($client);

        $raw = "To: $to\r\n";
        $raw .= "Subject: $subject\r\n";
        $raw .= "MIME-Version: 1.0\r\n";
        $raw .= "Content-Type: text/html; charset=utf-8\r\n\r\n";
        $raw .= $html;

        $base64 = rtrim(strtr(base64_encode($raw), '+/', '-_'), '=');

        $message = new Gmail\Message();
        $message->setRaw($base64);

        return $gmail->users_messages->send("me", $message);
    }
}
