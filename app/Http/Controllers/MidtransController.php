<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\TopUpTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
                    'quantity' => 1,
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
        // Retrieve Midtrans notification data
        $order_id = $request->input('order_id');
        $status_code = $request->input('status_code');
        $status_message = $request->input('status_message');
        $transaction_id = $request->input('transaction_id');
        $gross_amount = $request->input('gross_amount');
        $payment_type = $request->input('payment_type');
        $fraud_status = $request->input('fraud_status');
        $transaction_time = $request->input('transaction_time');
        $finish_redirect_url = $request->input('finish_redirect_url');

        // Optionally validate the request if needed (e.g., signature verification)
        // If you're not validating signature, skip that part

        // Check if the required fields exist in the notification
        if (!$order_id || !$status_code || !$transaction_id || !$gross_amount || !$payment_type) {
            return response()->json(['message' => 'Invalid notification data'], 400);
        }
        $user_id = Auth::user()->id;
        // Insert into the database
        $topUpTransaction = TopUpTransaction::create([
            'user_id' => $user_id,
            'order_id' => $order_id,
            'gross_amount' => $gross_amount,
            'status' => 'completed',
            'status_code' => $status_code,
            'transaction_id' => $transaction_id,
            'fraud_status' => $fraud_status,
            'payment_type' => $payment_type,
            'transaction_time' => $transaction_time,
            'finish_redirect_url' => $finish_redirect_url,
        ]);

        return response()->json(['message' => 'Notification successfully processed'], 200);
    }



}

