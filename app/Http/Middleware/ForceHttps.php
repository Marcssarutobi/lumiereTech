<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Force HTTPS en production : redirection 301 (308 pour les requêtes POST afin de
 * conserver la méthode) et en-tête HSTS sur les réponses sécurisées.
 */
class ForceHttps
{
    public function handle(Request $request, Closure $next): Response
    {
        $isSecure = $request->secure() || $request->header('X-Forwarded-Proto') === 'https';

        if (app()->environment('production') && ! $isSecure) {
            $status = in_array($request->method(), ['GET', 'HEAD'], true) ? 301 : 308;

            return redirect()->secure($request->getRequestUri(), $status);
        }

        $response = $next($request);

        if ($isSecure) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000');
        }

        return $response;
    }
}
