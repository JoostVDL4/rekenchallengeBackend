<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
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
        // Check if the user is authenticated and has an admin role
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request); // Allow access to the admin route
        }

        // Redirect non-admin users to the home page or another location
        return redirect('/')->with('error', 'You do not have access to this page.');
    }
}
