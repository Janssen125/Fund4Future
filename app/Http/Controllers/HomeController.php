<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Fund;
use App\Models\FundHistory;
use App\Models\PageAnalytics;

class HomeController extends Controller
{

    public function __construct() {
        $this->middleware(function (Request $request, $next) {
            // create a page analytics entry and check if its has 6 hours difference from the last entry
            $lastEntry = PageAnalytics::where('ip_address', $request->ip())
            ->where('page_url', $request->fullUrl())
            ->where('user_id', Auth::check() ? Auth::id() : null)
            ->where('created_at', '>=', now()->subHours(6))
            ->latest()
            ->first();
            if (!$lastEntry || $lastEntry->created_at->diffInHours(now()) >= 6) {
                PageAnalytics::create([
                    'user_id' => Auth::check() ? Auth::id() : null,
                    'ip_address' => $request->ip(),
                    'page_url' => $request->fullUrl(),
                    'user_agent' => $request->header('User-Agent'),
                ]);
            };
            return $next($request);
        });
    }
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
