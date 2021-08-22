<?php

namespace App\Http\Middleware;

use Closure;

class SweetAlertSession
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



        if (session('toast_error')) {

            toast(session('toast_error'), 'error');
        }
        if (session('toast_success')) {

            toast(session('toast_success'), 'success');
        }
        if (session('errors')) {

            toast(session('errors')->first(), 'error');
        }
        return $next($request);
    }
}