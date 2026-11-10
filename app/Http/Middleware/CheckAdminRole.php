<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna sudah login dan apakah role-nya admin (diubah ke lowercase agar aman)
        if (Auth::check() && strtolower(Auth::user()->role) === 'admin') {
            return $next($request);
        }

        abort(403, 'HALAMAN INI HANYA BISA DIAKSES OLEH ADMIN.');
    }
}