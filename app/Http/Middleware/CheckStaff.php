<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckStaff
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
      if(Auth::user()->is_staff == 1){
          return $next($request);
      }
        return redirect()->route('home');

    }
}
