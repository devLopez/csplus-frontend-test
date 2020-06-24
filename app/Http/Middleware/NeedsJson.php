<?php

namespace Spa\Http\Middleware;

use Closure;

class NeedsJson
{
    public function handle($request, Closure $next)
    {
        if ( $request->header('Content-Type') != 'application/json' ) {
            return error([], 406, 'Tipo de conteúdo inválido. Por favor, envie em formato JSON');
        }

        return $next($request);
    }
}
