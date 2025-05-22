<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fund;
use App\Models\FundHistory;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

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
            $user->ktpImg = $ktpImagePath;
            $user->save();
        }

        return redirect()->route('profileSettings')->with('success', 'NIK and KTP image have been saved successfully.');
    }

    public function updateName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validate profile picture
        ]);

        $user = auth()->user();

        $user->name = $request->name;

        if ($request->hasFile('profile_picture')) {
            if ($user->userImg && Storage::exists('img/' . $user->userImg)) {
                Storage::delete('img/' . $user->userImg);
            }
            $profilePicturePath = $request->file('profile_picture')->store('img', 'public');
            $user->userImg = basename($profilePicturePath);
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
