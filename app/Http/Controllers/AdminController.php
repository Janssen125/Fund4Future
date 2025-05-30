<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fund;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }

    public function activity() {
        return view('admin.activity');
    }

    public function notification() {
        return view('admin.notification');
    }

    public function ticketing() {
        $funds = Fund::with(['owner', 'chat'])->get();
        return view('admin.ticketing', compact('funds'));
    }

    public function userManagement() {
        return view('admin.userManagement');
    }

    public function fundList() {
        return view('admin.fundList');
    }
}
