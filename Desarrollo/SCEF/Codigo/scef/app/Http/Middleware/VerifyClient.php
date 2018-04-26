<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class VerifyClient
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
    if(! Auth::user()->is_client() || ! Auth::user()->is_affiliate() ){
      return redirect()->back();
    }
    return $next($request);
  }
}
