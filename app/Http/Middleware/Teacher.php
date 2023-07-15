<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Teacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role === 'Teacher' && Auth::user()->status === 'Approved') {
            return $next($request);
        } elseif (Auth::user()->role === 'Superadmin' && Auth::user()->status === 'Approved') {
            return $next($request);
        } else {
            return back()->with('error', 'Not enough permission');
        }
    }
}
