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
//      if (auth::check())
//          return $next($request);
//      return redirect()->route('signin');
        return $next($request);
    }
}
