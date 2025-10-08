<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class LicenseController extends Controller
{
    public function check()
    {
        // Fetch license JSON from GitHub
        $licenseUrl = 'https://raw.githubusercontent.com/Janssen125/keys/refs/heads/main/fund4future_license.json';
        $response = Http::get($licenseUrl);

        if ($response->failed()) {
            abort(403, 'License fetch expired');
        }

        $license = $response->json();
        try {
            // Convert string to Carbon instance (it handles ISO 8601)
            $expires = Carbon::parse($license['expires']);
            // Compare with current time in same timezone
            if (now()->greaterThan($expires)) {
                abort(403, 'License expired');
            }

        } catch (\Exception $e) {
            // In case the date is malformed
            abort(500, 'License expiration date invalid');
        }
        // Load public key
        $publicKeyPath = storage_path('public.pem');
        if (!file_exists($publicKeyPath)) {
            abort(403, 'public key not found');
        }

        $publicKey = file_get_contents($publicKeyPath);
        $signature = base64_decode($license['signature']);
        unset($license['signature']);

        // Verify signature
        $verified = openssl_verify(
            json_encode($license, JSON_UNESCAPED_SLASHES),
            $signature,
            $publicKey,
            OPENSSL_ALGO_SHA256
        );

        if ($verified !== 1) {
            abort(403, 'License invalid or tempered');
        }

        // License valid
        return response()->json([
            'status' => '✅ License valid',
            'client' => $license['client'],
            'expires' => $license['expires']
        ]);
    }
}
