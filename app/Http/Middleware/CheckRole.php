<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles): Response
    {
        if (in_array(auth()->user()->level, $roles)) {
            return $next($request);
        }

        abort(403, 'Unauthorized.'); // Ubah pesan sesuai kebutuhan
    }
}
