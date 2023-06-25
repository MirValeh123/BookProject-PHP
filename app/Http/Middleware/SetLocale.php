<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (in_array($request->segment(1), ['en'])) {
            app()->setLocale($request->segment(1));
            Session::put('lang', $request->segment(1));
            return $next($request);
        } else {
            app()->setLocale('az');
            Session::put('lang', 'az');
            return $next($request);
        }
    }
}
