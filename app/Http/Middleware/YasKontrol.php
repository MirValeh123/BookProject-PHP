<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class YasKontrol
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
        $yas=18;
        if ($yas<20) {

            echo 'Yasiniz 20den azdir!';
        }
        return $next($request);
    }
}
