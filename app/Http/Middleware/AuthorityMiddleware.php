<?php

namespace App\Http\Middleware;

use Closure;

class AuthorityMiddleware
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

        $agency_id   = request('agency');


        if (request('agency')) {
            $agency_id  = request('agency');
        } elseif (owner()) {

            $agency_id = auth()->user()->agencies ? auth()->user()->agencies->first()->id : null;
        } elseif (moderator()) {
            $agencies = explode(',', auth()->user()->can_access);

            $agency_id = count($agencies) > 0 ? $agencies[0] : null;
        } else {
            $agency_id = auth()->user()->agency_id != null ? auth()->user()->agency_id : null;
        }




        if ($agency_id != null) {
            if (owner()) {
                $agency_found =  auth()->user()->agencies->filter(function ($agency) use ($agency_id) {
                    return $agency->id == $agency_id;
                });

                if (!($agency_found->count() == 1)) {
                    abort(404);
                }
            } elseif (moderator()) {
                $agencies = explode(',', auth()->user()->can_access);
                if (!in_array($agency_id, $agencies)) {
                    abort(404);
                }
            } else {
                if (!(auth()->user()->agency_id == $agency_id)) {

                    abort(404);
                }
            }






            return $next($request);
        } else {
            abort(404);
        }
    }
}