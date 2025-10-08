<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LicenseController extends Controller
{
    public function check()
    {
        // Fetch license JSON from GitHub
        $licenseUrl = 'https://raw.githubusercontent.com/Janssen125/keys/refs/heads/main/fund4future_license.json';
        $response = Http::get($licenseUrl);

        if ($response->failed()) {
            return response()->json(['status' => '❌ License fetch failed'], 403);
        }

        $license = $response->json();

        // Load public key
        $publicKeyPath = storage_path('public.pem');
        if (!file_exists($publicKeyPath)) {
            return response()->json(['status' => '❌ Public key not found'], 403);
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
            return response()->json(['status' => '❌ License invalid or tampered'], 403);
        }

        // Check expiration
        if (now()->greaterThan($license['expires'])) {
            return response()->json(['status' => '⚠️ License expired'], 403);
        }

        // License valid
        return response()->json([
            'status' => '✅ License valid',
            'client' => $license['client'],
            'expires' => $license['expires']
        ]);
    }
}
