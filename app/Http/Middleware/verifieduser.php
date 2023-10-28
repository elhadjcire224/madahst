<?php

namespace App\Http\Middleware;

use App\Exceptions\UserNotVerifiedException;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class verifieduser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() and !Auth::user()->verified){
            throw new UserNotVerifiedException;
        }
        return $next($request);
    }
}
