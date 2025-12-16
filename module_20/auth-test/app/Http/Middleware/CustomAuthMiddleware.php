<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check Session 
        if(!$request->session()->has('custom_user_id'))
            {
            // Not logged in and redirect to login page
            return redirect()->route('custom.login')->with('error', 'Please Login to access to the Dashboard');
        }
        // Logged in --> Continue to request
        return $next($request);
    }
}
