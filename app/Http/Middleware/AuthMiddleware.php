<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
{
    // بررسی اینکه آیا کاربر احراز هویت شده است
    if (!(Auth::check()&&Auth::user()->type=='1')) {
        // اگر کاربر احراز هویت نشده باشد، به صفحه ورود هدایت شود
        return redirect('/index')->with('error', 'You must be logged in to access this page.');
    }

    // در غیر این صورت، ادامه پردازش درخواست
    return $next($request);
}

}
