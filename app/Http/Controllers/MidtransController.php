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
        // Capture the actual payload Midtrans sends
        $data = $request->all();

        // Dump and return response for debugging
        return response()->json([
            'received' => $data
        ]);
    }


}

