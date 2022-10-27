<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class Employer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
        if (Auth::check() && Auth::user()->role == 'employer') {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 'jobseeker') {
            return redirect('/customer');
        }
        else {
            return redirect('/admin');
        }
    }
}
