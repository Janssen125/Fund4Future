<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MidtransController;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes(['verify' => true]);

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::middleware(['auth', 'verified'])->get('/emailverifiedsuccess', function () {
    return view('/');
})->name('emailverifiedsuccess');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('home')->with('message', 'Email verified successfully!');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/resend', function (Request $request) {
    if (Auth::user()->hasVerifiedEmail()) {
        return redirect('/emailverifiedsuccess');
    }

    Auth::user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification email sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact')->middleware('auth');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

Route::resource('category', CategoryController::class);
Route::resource('fund', FundController::class);
Route::resource('mail', MailController::class);
Route::resource('user', UserController::class);

Route::post('/midtrans/topup', [MidtransController::class, 'createTransaction'])->name('midtrans.topup');
Route::post('/midtrans/notification', [MidtransController::class, 'handleNotification'])->name('midtrans.notification');
Route::post('/midtrans/withdraw', [MidtransController::class, 'withdraw'])->name('midtrans.withdraw');

Route::get('/test', function() {
    return view('test.test');
})->middleware('auth');
Route::post('/test-midtrans', function (Request $request) {
    Log::info('📩 Test Midtrans Route:', ['data' => $request->all()]);
    return response()->json(['message' => 'Test route working!', 'data' => $request->all()], 200);
});
