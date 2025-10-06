<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::all();
        return view('admin.user', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'nohp' => 'required|string|max:15|regex:/^[0-9]+$/',
            'jk' => 'required|in:pria,wanita',
            'password' => 'required|string|min:8|confirmed',
            'dob' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the user
        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'jk' => $request->jk,
            'dob' => $request->dob,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        $user->sendEmailVerificationNotification();

        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity_type' => 'register',
            'description' => "Registered a new user: {$user->name}",
        ]);

        return redirect()->route('verification.notice')->with('message', 'Please verify your email before logging in.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('admin.userDetail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('admin.createNupdate.updateUser', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'nohp' => 'nullable|regex:/^[0-9]+$/',
            'jk' => 'required|in:pria,wanita',
            'dob' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'role' => 'required|in:admin,user,staff',
            'balance' => 'required|numeric|min:0',
            'nik' => 'nullable|numeric|digits:16',
            'ktpImg' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'userImg' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('userImg')) {
            $userImgPath = $request->file('userImg')->store('img', 'public');
            $user->userImg = basename($userImgPath);
        }

        if ($request->hasFile('ktpImg')) {
            $ktpImgPath = $request->file('ktpImg')->store('ktp_images', 'public');
            $user->ktpImg = basename($ktpImgPath);
        }

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'nohp' => $request->input('nohp'),
            'jk' => $request->input('jk'),
            'dob' => $request->input('dob'),
            'role' => $request->input('role'),
            'balance' => $request->input('balance'),
            'nik' => $request->input('nik') ?? null,
            'userImg' => $user->userImg ?? null,
            'ktpImg' => $user->ktpImg ?? null,
        ]);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity_type' => 'update',
            'description' => "Updated user with ID: {$id}",
        ]);

        return redirect()->route('user.index')->with('message', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);

        if ($data->userImg && Storage::exists('img/' . $data->userImg)) {
            Storage::delete('img/' . $data->userImg);
        }

        if ($data->ktpImg && Storage::exists('ktp_images/' . $data->ktpImg)) {
            Storage::delete('ktp_images/' . $data->ktpImg);
        }

        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity_type' => 'delete',
            'description' => "Deleted user with ID: {$id}",
        ]);

        $data->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully!');
    }
}
