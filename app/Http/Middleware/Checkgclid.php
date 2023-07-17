<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\ApiUtils;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Checkgclid
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

        if ($request->input('gclid') !== null) {
            $request->session()->put('gclid', $request->input('gclid'));
        }

        if ($request->input('fbclid') !== null) {
            $request->session()->put('fbclid', $request->input('fbclid'));
        }

        return $next($request);
    }
}
