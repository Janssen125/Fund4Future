<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Midtrans\Snap;
use Midtrans\Config;
use App\Http\Controllers\LicenseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/midtrans/topup', function (Request $request) {
    // Set Midtrans configuration
    Config::$serverKey = env('MIDTRANS_SERVER_KEY');
    Config::$isProduction = false;
    Config::$isSanitized = true;
    Config::$is3ds = true;

    // Create transaction details
    $params = [
        'transaction_details' => [
            'order_id' => uniqid(),
            'gross_amount' => $request->amount,
        ],
        'customer_details' => [
            'first_name' => 'Test',
            'email' => 'test@example.com',
        ]
    ];

    try {
        $snapToken = Snap::getSnapToken($params);
        return response()->json(['snap_token' => $snapToken]);
    } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});
// Route::get('/license-check', [LicenseController::class, 'check']);
