<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('user.dashboard');
    }

    public function about() {
        return view('user.about');
    }

    public function profile($id) {
        $data = User::findOrFail($id);
        return view('user.profile', compact($data));
    }

    public function contact() {
        return view('user.contact');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('message', 'Log Out Success!');
    }
}
