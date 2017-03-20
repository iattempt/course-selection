<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Authority
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
        if (false) {
            return redirect('/sign_in');
        }
        return $next($request);
    }
}
