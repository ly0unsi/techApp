<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }
    public function handle($request, Closure $next, ...$guards)
    {
        if (isset($_COOKIE["jwt"])) {
            if ($jwt = $_COOKIE["jwt"]) {
                $request->headers->set('Authorization', "Bearer" . $jwt); # code...
                $request->headers->set('X-Requested-With', "XMLHttpRequest"); # code...

            }
        }

        $this->authenticate($request, $guards);

        return $next($request);
    }
}
