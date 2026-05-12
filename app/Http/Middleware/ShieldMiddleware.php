<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShieldMiddleware
{
    public function handle(Request $request, Closure $next): Response
{
    $username = env('SHIELD_USER');
    $password = env('SHIELD_PASSWORD');

    if (
        !isset($_SERVER['PHP_AUTH_USER']) ||
        !isset($_SERVER['PHP_AUTH_PW']) ||
        $_SERVER['PHP_AUTH_USER'] !== $username ||
        $_SERVER['PHP_AUTH_PW'] !== $password
    ) {
        header('WWW-Authenticate: Basic realm="Protected Area"');
        header('HTTP/1.0 401 Unauthorized');

        exit('Acceso protegido');
    }

    return $next($request);
}
}
