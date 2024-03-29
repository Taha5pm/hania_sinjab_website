<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IsSuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if ($role == 'Both') {
            return $next($request);
        } else if (!auth()->check() || auth()->user()->role != 'superadmin') {
            Auth::guard('user')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            abort(403);
        }
        return $next($request);
    }
}
