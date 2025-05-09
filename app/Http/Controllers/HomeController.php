<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Fund;
use App\Models\FundHistory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Fund::with('fundDetail')->where('approvalStatus', 'approved')->whereColumn('currAmount', '<', 'targetAmount')->orderBy('created_at', 'desc')->take(5)->get();
        $recommended = Fund::with('fundDetail')->where('approvalStatus', 'approved')->whereColumn('currAmount', '<', 'targetAmount')->orderBy('created_at', 'asc')->take(4)->get();
        return view('user.dashboard', compact(['projects', 'recommended']));
    }

    public function about() {
        return view('user.about');
    }

    public function profile() {
        return view('user.profile');
    }

    public function contact() {
        return view('user.contact');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('message', 'Log Out Success!');
    }
}
