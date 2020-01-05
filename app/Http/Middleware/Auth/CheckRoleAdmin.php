<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Auth;
class CheckRoleAdmin
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
        if(Auth::user()->toAdmin()){
            return $next($request);
        }
        return abort(403);
    }
}
