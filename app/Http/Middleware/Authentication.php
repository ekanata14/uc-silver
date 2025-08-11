<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authentication
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('auth.login')->with('error', 'You must log in first.');
        }

        // Check if the user's role is not 'admin'
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Access denied.');
        }

        return $next($request);
    }
}
