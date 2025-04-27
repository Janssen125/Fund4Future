<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileSettingController extends Controller
{
    public function fundingList()
    {
        return view('user.profileSettingPages.fundingList');
    }

    public function fundingTransactionHistory() {
        return view('user.profileSettingPages.fundingTransactionHistory');
    }

    public function fundingHistory() {
        return view('user.profileSettingPages.fundingHistory');
    }

    public function settings() {
        return view('user.profileSettingPages.settings');
    }

    public function help() {
        return view('user.profileSettingPages.help');
    }
}
