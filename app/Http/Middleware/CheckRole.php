<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
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

            $user = $request->user();
            $valid = 0; // Default
            if ($user && $user->level == 'Admin') {
                // Jika user adalah admin, atur nilai $valid sesuai kebutuhan
                $valid = User::where('is_active', 0)->count();
            }
            // Mengirimkan variabel ke setiap request
            view()->share('valid', $valid);
            
            return $next($request);
        }






        abort(403, 'Unauthorized.'); // Ubah pesan sesuai kebutuhan
    }
}
