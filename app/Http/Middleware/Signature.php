<?php

namespace Logistic\Http\Middleware;

use Closure;

class Signature
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
        $response = $next($request);
        $response->headers->set( 'X-Application-Name', config('app.name') );
        return $response;
    }
}
