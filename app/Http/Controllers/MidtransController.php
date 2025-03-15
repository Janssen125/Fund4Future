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

    public function handleNotification(Request $request)
    {
        // $serverKey = env('MIDTRANS_SERVER_KEY');

        // // Extract data safely
        // $order_id = $request->input('order_id');
        // $status_code = $request->input('status_code');
        // $gross_amount = $request->input('gross_amount');
        // $signature_key = $request->input('signature_key');

        // if (!$order_id || !$status_code || !$gross_amount || !$signature_key) {
        //     return response()->json(['message' => 'Invalid request'], 400);
        // }

        // // Generate expected signature
        // $expected_signature = hash("sha512", $order_id . $status_code . $gross_amount . $serverKey);


        return response()->json(['message' => 'Notification received'], 200);
    // Verify signature key
    // if ($signature_key === $expected_signature) {
    //     // Get transaction
    //     $transaction = TopUpTransaction::where('order_id', $order_id)->first();

    //     if ($transaction) {
    //         if ($request->transaction_status == 'settlement') {
    //             // Update user's balance
    //             $user = $transaction->user;
    //             $user->increment('balance', $transaction->amount);
    //             $transaction->update(['status' => 'completed']);

    //             return response()->json(['message' => 'Transaction processed successfully'], 200);
    //         } elseif ($request->transaction_status == 'pending') {
    //             $transaction->update(['status' => 'pending']);
    //         } elseif ($request->transaction_status == 'expire') {
    //             $transaction->update(['status' => 'expired']);
    //         } elseif ($request->transaction_status == 'cancel' || $request->transaction_status == 'deny') {
    //             $transaction->update(['status' => 'failed']);
    //         }
    //         return response()->json(['message' => 'Transaction status updated'], 200);
    //     }

    //     return response()->json(['message' => 'Transaction not found'], 404);
    // }

    // return response()->json(['message' => 'Invalid signature key'], 400);

    }
}

