<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fund;
use App\Models\FundHistory;

class ProfileSettingController extends Controller
{
    public function fundingList()
    {
        $fundings = Fund::where('owner_id', auth()->user()->id)->whereIn('approvalStatus', ['pending', 'approved'])->get();
        return view('user.profileSettingPages.fundingList', compact('fundings'));
    }

    public function fundingTransactionHistory()
    {
        $fundHistories = FundHistory::where('funder_id', auth()->user()->id)->get();
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

    public function help() {
        return view('user.profileSettingPages.help');
    }
}
