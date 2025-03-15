<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\TopUpTransaction;
use Illuminate\Support\Facades\Auth;

class MidtransController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION') == 'true';
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function createTransaction(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1' // Min Rp 1000
        ]);

        $user = Auth::user();

        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $request->amount,
                'payment_type' => 'qris',
                'enabled_payments' => ['gopay', 'shopeepay', 'bca_va'],
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'item_details' => [
                [
                    'id' => uniqid(),
                    'price' => $request->amount,
                    'quantity' => $request->amount,
                    'name' => 'Top-up Balance',
                    'brand' => 'Fund4Future',
                    'category' => 'Top-up',
                    'merchant_name' => 'Fund4Future',
                ],
            ],
                'expiry' => [
                    'start_time' => date('Y-m-d H:i:s O'),
                    'unit' => 'minute',
                    'duration' => 10,
                ],

        ];

        $snapToken = Snap::getSnapToken($params);

        return view('test.payment', compact('snapToken'));
    }

    // public function handleNotification(Request $request)
    // {
    //     $serverKey = env('MIDTRANS_SERVER_KEY');
    //     $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);

    //     if ($hashed == $request->signature_key) {
    //         if ($request->transaction_status == 'settlement') {
    //             $transaction = TopUpTransaction::where('order_id', $request->order_id)->first();
    //             if ($transaction) {
    //                 $user = $transaction->user;
    //                 $user->increment('balance', $transaction->amount);
    //                 $transaction->update(['status' => 'completed']);
    //             }
    //         }
    //     }
    // }

    public function handleNotification(Request $request)
    {
        // Log::info('Midtrans Notification Received:', $request->all());

        // $serverKey = env('MIDTRANS_SERVER_KEY');
        // $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);

        // if ($hashed == $request->signature_key) {
        //     if ($request->transaction_status == 'settlement') {
        //         $transaction = TopUpTransaction::where('order_id', $request->order_id)->first();
        //         if ($transaction) {
        //             $user = $transaction->user;
        //             $user->increment('balance', $transaction->amount);
        //             $transaction->update(['status' => 'completed']);

        //             return response()->json(['message' => 'Transaction processed successfully'], 200);
        //         }
        //     }
        // }
        // return response()->json(['message' => 'Invalid signature key'], 400);
    // Log request data for debugging
    Log::info('Midtrans Notification Received:', $request->all());

    // Get Midtrans server key from .env
    $serverKey = env('MIDTRANS_SERVER_KEY');

    // Extract necessary fields
    $order_id = $request->order_id;
    $status_code = $request->status_code;
    $gross_amount = $request->gross_amount;
    $signature_key = $request->signature_key;

    // Generate expected signature key
    $expected_signature = hash("sha512", $order_id . $status_code . $gross_amount . $serverKey);

    // Verify signature key
    if ($signature_key === $expected_signature) {
        // Get transaction
        $transaction = TopUpTransaction::where('order_id', $order_id)->first();

        if ($transaction) {
            if ($request->transaction_status == 'settlement') {
                // Update user's balance
                $user = $transaction->user;
                $user->increment('balance', $transaction->amount);
                $transaction->update(['status' => 'completed']);

                return response()->json(['message' => 'Transaction processed successfully'], 200);
            } elseif ($request->transaction_status == 'pending') {
                $transaction->update(['status' => 'pending']);
            } elseif ($request->transaction_status == 'expire') {
                $transaction->update(['status' => 'expired']);
            } elseif ($request->transaction_status == 'cancel' || $request->transaction_status == 'deny') {
                $transaction->update(['status' => 'failed']);
            }
            return response()->json(['message' => 'Transaction status updated'], 200);
        }

        return response()->json(['message' => 'Transaction not found'], 404);
    }

    return response()->json(['message' => 'Invalid signature key'], 400);

    }



//     public function handleNotification(Request $request)
// {
//     $serverKey = env('MIDTRANS_SERVER_KEY');

//     // Get JSON data from Midtrans
//     $json = json_decode(file_get_contents('php://input'), true);

//     if (!$json) {
//         Log::error('Midtrans Notification: Invalid JSON received');
//         return response()->json(['message' => 'Invalid JSON'], 400);
//     }

//     // Generate the expected signature
//     $expectedSignature = hash("sha512", $json['order_id'] . $json['status_code'] . $json['gross_amount'] . $serverKey);

//     // Validate signature
//     if ($expectedSignature !== $json['signature_key']) {
//         Log::warning('Midtrans Notification: Invalid signature detected');
//         return response()->json(['message' => 'Invalid signature'], 403);
//     }

//     // Handle different transaction statuses
//     if (in_array($json['transaction_status'], ['settlement', 'capture', 'success'])) {
//         $transaction = TopUpTransaction::where('order_id', $json['order_id'])->first();

//         if ($transaction && $transaction->status !== 'completed') {
//             $user = $transaction->user;
//             $user->increment('balance', $transaction->amount);
//             $transaction->update(['status' => 'completed']);

//             Log::info("Transaction {$json['order_id']} completed successfully.");
//         }
//     }

//     return response()->json(['message' => 'Notification handled successfully']);
// }
}

//
//U0ItTWlkLXNlcnZlci1PUldOXzE2a3BJb1pQUlBXXzRGM3RFT1g=
