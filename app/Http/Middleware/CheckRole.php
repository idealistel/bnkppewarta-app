<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Memeriksa apakah pengguna sudah masuk dan memiliki peran yang benar
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Jika pengguna tidak memiliki akses, arahkan ke halaman 403 atau halaman lain
        return back();
    }
}
