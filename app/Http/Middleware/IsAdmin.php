<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah pengguna terautentikasi dan memiliki hak akses admin
        if (auth()->check()) {
            if (auth()->user()->is_admin) {
                return $next($request);
            } else {
                // Jika terautentikasi tapi bukan admin, beri akses ditolak
                abort(403, 'Unauthorized action.');
            }
        }

        // Jika tidak terautentikasi, arahkan ke halaman login
        return redirect('/login')->with('error', 'You need to login first.');
    }
}
