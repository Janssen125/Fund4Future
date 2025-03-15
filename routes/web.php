<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MidtransController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Midtrans\Notification;

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

Auth::routes();

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact')->middleware('auth');
Route::resource('category', CategoryController::class);
Route::resource('fund', FundController::class);
Route::resource('mail', MailController::class);
Route::resource('user', UserController::class);
Route::post('/midtrans/topup', [MidtransController::class, 'createTransaction'])->name('midtrans.topup');
// Route::post('/midtrans/notification', [MidtransController::class, 'handleNotification'])->name('midtrans.notification');
Route::post('/midtrans/withdraw', [MidtransController::class, 'withdraw'])->name('midtrans.withdraw');
Route::post('/midtrans/notification', function (Request $request) {
    try {
        // Get Midtrans notification
        $notif = new Notification();

        // Extract transaction status
        $transaction = $notif->transaction_status;
        $orderId = $notif->order_id;

        // Log the notification for debugging
        Log::info("Midtrans Notification Received:", (array) $notif);

        // Process status
        if ($transaction == 'settlement') {
            // Payment success, update order status
        } elseif ($transaction == 'pending') {
            // Payment is pending
        } elseif ($transaction == 'deny' || $transaction == 'expire' || $transaction == 'cancel') {
            // Payment failed
        }

        return response()->json(['message' => 'Notification received']);
    } catch (\Exception $e) {
        Log::error("Midtrans Notification Error: " . $e->getMessage());
        return response()->json(['message' => 'Error'], 500);
    }
});


Route::get('/test', function() {
    return view('test.test');
})->middleware('auth');
