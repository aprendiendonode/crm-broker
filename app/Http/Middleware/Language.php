<?php

namespace App\Http\Middleware;

use Closure;

class Language
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

        if(auth()->check() && auth()->user()->language != null && in_array(auth()->user()->language,['en','ar'])){
            app()->setLocale(auth()->user()->language);
        }else{
            if(session()->has('locale')){

                app()->setLocale(session('locale'));
            }
            else {
                app()->setLocale('en');
            }
        }


        return $next($request);
    }
}
