<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\WebUtils;

class EnsurePhoneIsVerified
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
        if($request->user() && !$request->user()->hasVerifiedPhone() && !WebUtils::verifyPhone($request->user()->user_mobile_nums()->get() )){
            // dd($request->user()->hasVerifiedPhone());

                return redirect()->route('phone_verification');

        }


        return $next($request);
    }
}
