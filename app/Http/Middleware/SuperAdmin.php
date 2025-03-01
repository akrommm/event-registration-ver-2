<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna yang terautentikasi adalah admin
        if (auth()->check() && auth()->user()->role->first()?->module->app !== 'Super Admin') {
            abort(403);
        }

        return $next($request);
    }
}
