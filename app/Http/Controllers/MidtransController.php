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
        $serverKey = env('MIDTRANS_SERVER_KEY');

        // Extract data safely
        $order_id = $request->input('order_id');
        $status_code = $request->input('status_code');
        $gross_amount = $request->input('gross_amount');
        $signature_key = $request->input('signature_key');

        // Validate required parameters
        if (!$order_id || !$status_code || !$gross_amount || !$signature_key) {
            return response()->json(['message' => 'Invalid request'], 400);
        }

        // Generate expected signature
        $expected_signature = hash("sha512", $order_id . $status_code . $gross_amount . $serverKey);

        // Verify signature
        if ($signature_key !== $expected_signature) {
            return response()->json(['message' => 'Invalid signature'], 400);
        }

        // Find the transaction
        $transaction = TopUpTransaction::where('order_id', $order_id)->first();
        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        // If transaction is successful, update the balance
        if ($status_code == '200') {
            $user = $transaction->user;
            $user->increment('balance', $transaction->amount);
            $transaction->update(['status' => 'completed']);
        }

        return response()->json(['message' => 'Notification processed successfully'], 200);
    }

}

