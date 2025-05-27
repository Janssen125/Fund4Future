<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin.ticketing');
    }

    public function userManagement() {
        return view('admin.userManagement');
    }

    public function createCategory() {
        return view('admin.createNupdate.createCategory');
    }

    public function updateCategory() {
        return view('admin.createNupdate.updateCategory');
    }
}
