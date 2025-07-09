<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekPeran
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$perans): Response
    {
        // Cek apakah peran pengguna ada di dalam daftar peran yang diizinkan
        if (in_array($request->user()->peran, $perans)) {
            return $next($request);
        }

        // Jika tidak, kembalikan ke halaman yang tidak diizinkan
        abort(403, 'ANDA TIDAK MEMILIKI AKSES');
    }
}
