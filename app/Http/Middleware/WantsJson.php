<?php

namespace Spa\Http\Middleware;

use Closure;

class WantsJson
{
    public function handle($request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}
