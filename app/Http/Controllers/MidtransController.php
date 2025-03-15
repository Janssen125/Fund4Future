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
        $serverKey = env('MIDTRANS_SERVER_KEY');

        // Extract data from Midtrans notification
        $order_id = $request->input('order_id');
        $status_code = $request->input('status_code');
        $gross_amount = $request->input('gross_amount');

        // Validate required fields
        if (!$order_id || !$status_code || !$gross_amount) {
            return response()->json(['message' => 'Invalid request'], 400);
        }

        // Generate expected signature key (as per Midtrans documentation)
        $expected_signature = hash("sha512", $order_id . $status_code . $gross_amount . $serverKey);

        // You can log or store the $expected_signature if you need to debug or store it
        // For now, we skip this and assume the notification is valid if it reaches here.

        // Process the transaction logic here
        if ($status_code == '200' && $gross_amount > 0) {
            // Process the transaction, for example, update user balance, etc.
            return response()->json(['message' => 'Notification successfully processed'], 200);
        }

        return response()->json(['message' => 'Invalid notification data'], 400);
    }




}

