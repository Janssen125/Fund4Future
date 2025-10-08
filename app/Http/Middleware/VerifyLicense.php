<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\LicenseController;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class VerifyLicense
{
public function handle(Request $request, Closure $next)
{
    // Skip API license-check itself to avoid recursion
    if ($request->is('api/license-check')) {
        return $next($request);
    }

    try {
        // ⚡ Always fetch from GitHub (no caching)
        $controller = new LicenseController();
        $response = $controller->check();
        $licenseData = $response->getData(true);

        // Check for invalid/tampered license
        if (!isset($licenseData['status']) || str_contains($licenseData['status'], '❌')) {
            if ($request->expectsJson()) {
                return response()->json(['status' => '❌ License invalid or expired'], 403);
            }
            abort(403, 'License invalid or expired');
        }

        // Check for expired license
        if (isset($licenseData['expires'])) {
            $expires = Carbon::parse($licenseData['expires']);
            if (now()->greaterThan($expires)) {
                if ($request->expectsJson()) {
                    return response()->json(['status' => '⚠️ License expired'], 403);
                }
                abort(403, 'License expired');
            }
        }

    } catch (\Exception $e) {
        if ($request->expectsJson()) {
            return response()->json(['status' => '❌ License check failed', 'error' => $e->getMessage()], 500);
        }
        abort(500, 'License check failed: ' . $e->getMessage());
    }

    return $next($request);
}


}