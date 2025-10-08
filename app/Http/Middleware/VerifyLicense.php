<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VerifyLicense
{
    public function handle(Request $request, Closure $next)
    {
        try {
            // Call your existing API endpoint that checks the license
            $response = Http::get(url('/api/license-check'));

            if ($response->failed()) {
                dd($response->body());
                // return response()->view('errors.license', [
                //     'message' => 'License server unreachable.'
                // ], 500);
            }

            $data = $response->json();

            if (!isset($data['status']) || str_contains($data['status'], '❌')) {
                dd($data['status']);
                // return response()->view('errors.license', [
                //     'message' => 'License invalid or expired.'
                // ], 403);
            }

        } catch (\Exception $e) {
            dd($e->getMessage());
            // return response()->view('errors.license', [
            //     'message' => 'License check failed: ' . $e->getMessage()
            // ], 500);
        }

        // ✅ If everything is fine, continue
        return $next($request);
    }
}
