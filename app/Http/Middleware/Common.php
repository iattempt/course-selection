<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Common
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && (
            Auth::user()->isAuthority() ||
            Auth::user()->isProfessor() ||
            Auth::user()->isStudent()
            ))
        {
            return $next($request);
        }
        return redirect('login');
    }
}
