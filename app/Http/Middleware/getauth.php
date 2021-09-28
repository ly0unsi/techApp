<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class getauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (isset($_COOKIE["jwt"])) {
            if ($jwt = $_COOKIE["jwt"]) {
                $request->headers->set('Authorization', "Bearer" . $jwt); # code...
                $request->headers->set('X-Requested-With', "XMLHttpRequest"); # code...

            }
        }
        return $next($request);
    }
}
