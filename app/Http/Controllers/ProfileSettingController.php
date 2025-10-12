<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fund;
use App\Models\FundHistory;
use App\Models\Category;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Storage;
use Google\Client;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;
use Google\Service\Drive\Permission;
class ProfileSettingController extends Controller
{
    public function fundingList()
    {
        $fundings = Fund::where('owner_id', auth()->user()->id)->whereIn('approvalStatus', ['pending', 'approved'])->get();
        return view('user.profileSettingPages.fundingList', compact('fundings'));
    }

    public function fundingTransactionHistory()
    {
        $fundHistories = FundHistory::with('fund')->where('funder_id', auth()->user()->id)->get();
        return view('user.profileSettingPages.fundingTransactionHistory', compact('fundHistories'));
    }

    public function fundingHistory() {
        $fundings = Fund::where('owner_id', auth()->user()->id)->whereIn('approvalStatus', ['declined', 'finished'])->get();
        return view('user.profileSettingPages.fundingHistory', compact('fundings'));
    }

    public function topup() {
        return view('user.profileSettingPages.topup');
    }

    public function settings() {
        return view('user.profileSettingPages.settings');
    }

    public function advancedData() {
        if(auth()->user()->nik) {
            return redirect()->route('home')->with('message', 'You have already verified your profile.');
        }
        return view('user.profileSettingPages.advancedData');
    }

    public function saveNikAndKtp(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric|digits:16|unique:users,nik',
            'ktp_img' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        $user = auth()->user();

        if ($request->hasFile('ktp_img')) {
            $ktpImagePath = $request->file('ktp_img')->store('ktp_images', 'public');

            $user->nik = $request->nik;
            $user->ktpImg = basename($ktpImagePath);
            $user->save();
        }

        ActivityLog::create([
            'user_id' => $user->id,
            'activity_type' => 'profile_update',
            'description' => "User {$user->name} has updated their NIK and KTP image.",
            'created_at' => now(),
        ]);

        return redirect()->route('profileSettings')->with('success', 'NIK and KTP image have been saved successfully.');
    }

    public function updateName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = auth()->user();
        $user->name = $request->name;

        if ($request->hasFile('profile_picture')) {

            // Initialize Google client
            $client = new Client();
            $client->setClientId(env('GOOGLE_CLIENT_ID'));
            $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
            $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
            $client->setAccessType('offline');
            $client->setPrompt('select_account consent');

            // Add required scopes
            $client->addScope([
                'https://www.googleapis.com/auth/drive.file',
                'https://www.googleapis.com/auth/gmail.send',
            ]);

            // Use the REFRESH TOKEN
            $client->refreshToken(env('GOOGLE_REFRESH_TOKEN'));
            $accessToken = $client->getAccessToken();

            if (!isset($accessToken['access_token'])) {
                throw new \Exception('Failed to retrieve access token using refresh token.');
            }


            $service = new Drive($client);

            $folderName = "Fund4Future";
            $folderId = null;

            $existingFolder = $service->files->listFiles([
                'q' => "name='{$folderName}' and mimeType='application/vnd.google-apps.folder' and trashed=false",
                'fields' => 'files(id, name)',
            ]);

            if(count($existingFolder->files) > 0) {
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

            // Upload the file to Google Drive
            $file = new DriveFile([
                'name' => $request->file('profile_picture')->getClientOriginalName(),
                'mimeType' => $request->file('profile_picture')->getMimeType(),
                'parents' => [$folderId],
            ]);
            // $file->setName($request->file('profile_picture')->getClientOriginalName());
            // $file->setMimeType($request->file('profile_picture')->getMimeType());

            $createdFile = $service->files->create($file, [
                'data' => file_get_contents($request->file('profile_picture')->getRealPath()),
                'mimeType' => $request->file('profile_picture')->getMimeType(),
                'uploadType' => 'multipart',
            ]);

            // Make the file public
            $permission = new Permission();
            $permission->setType('anyone');
            $permission->setRole('reader');
            $service->permissions->create($createdFile->id, $permission);

            // Public URL
            $publicUrl = "https://drive.google.com/thumbnail?id={$createdFile->id}&export=view";

            // Save the URL to database
            $user->userImg = $publicUrl;
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
    public function help() {
        return view('user.profileSettingPages.help');
    }

    public function createFund() {
        $categories = Category::all();
        return view('user.createNupdate.createFund', compact('categories'));
    }
}
