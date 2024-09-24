<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Pengunjung;

class LogPengunjung
{
    public function handle(Request $request, Closure $next)
    {
        $ipAddress = $request->ip();
        $userAgent = $request->header('User-Agent');

        // Cek apakah pengunjung sudah tercatat hari ini
        if (!Pengunjung::whereDate('created_at', now()->toDateString())
                ->where('ip_address', $ipAddress)
                ->exists()) {
            Pengunjung::create([
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
            ]);
        }

        return $next($request);
    }
}
