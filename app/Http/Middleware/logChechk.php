<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class logChechk
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ((Session()->has('loginId') || Session()->has('adminLoginId')) && (url('/admin') == $request->url() || url('login') == $request->url() || url('register') == $request->url())) {
            return back()->with('fail', 'You have to logout first');
        }
        return $next($request);
    }
}
