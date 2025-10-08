<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\LicenseController;

class VerifyLicense
{
    public function handle(Request $request, Closure $next)
    {
        // Skip API itself to avoid recursion
        if ($request->is('api/license-check')) {
            return $next($request);
        }

        try {
            $controller = new LicenseController();
            $response = $controller->check();
            $data = $response->getData(true); // convert JsonResponse to array

            if (!isset($data['status']) || str_contains($data['status'], '❌')) {
                abort(403, 'License invalid or expired.');
            }

            if (isset($data['status']) && str_contains($data['status'], '⚠️')) {
                abort(403, 'License expired.');
            }

        } catch (\Exception $e) {
            abort(500, 'License check failed: ' . $e->getMessage());
        }

        return $next($request);
    }

}
