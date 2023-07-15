<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (Auth::user()->role === 'Superadmin' && Auth::user()->status === 'Approved') {
                    return redirect(RouteServiceProvider::HOME);
                } elseif (Auth::user()->role === 'Teacher'  && Auth::user()->status == 'Approved') {
                    return redirect(RouteServiceProvider::HOME);
                } elseif (Auth::user()->role == 'Student' && Auth::user()->status == 'Approved') {
                    return redirect(route('home'));
                } else {
                    $status = Auth::user()->status;
                    Auth::guard('web')->logout();

                    $request->session()->invalidate();

                    $request->session()->regenerateToken();
                    return back()->with('error', 'Sorry ! your form is ' . $status);
                }
            }
        }

        return $next($request);
    }
}
