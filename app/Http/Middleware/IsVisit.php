<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class IsVisit
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
        if(Session::has('visit')){
            return $next($request);
        }else{
            return redirect('/must-auth');
        }
    }
}
