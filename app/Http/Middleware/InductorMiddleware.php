<?php

namespace App\Http\Middleware;

use ChrisReedIO\Inductor\Inductor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use function auth;
use function config;

class InductorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Inductor::share('search_key', config('scout.meilisearch.search_key'));
        Inductor::share('user', auth()->user()?->toArray());
        return $next($request);
    }
}
