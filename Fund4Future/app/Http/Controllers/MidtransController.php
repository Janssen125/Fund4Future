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
                'gross_amount' => $request->amount
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email
            ],
            'payment_type' => 'qris', // Supports GoPay, ShopeePay, etc.
            'enabled_payments' => ['gopay', 'shopeepay', 'bca_va']
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('test.payment', compact('snapToken'));
    }

    public function handleNotification(Request $request)
    {
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'settlement') {
                $transaction = TopUpTransaction::where('order_id', $request->order_id)->first();
                if ($transaction) {
                    $user = $transaction->user;
                    $user->increment('balance', $transaction->amount);
                    $transaction->update(['status' => 'completed']);
                }
            }
        }
    }
}

//
//U0ItTWlkLXNlcnZlci1PUldOXzE2a3BJb1pQUlBXXzRGM3RFT1g=
