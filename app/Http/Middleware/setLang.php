<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Request;

class setLang
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
        \App::setLocale(Request::segment(1));
        return $next($request);
    }
}
