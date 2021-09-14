<?php

namespace App\Http\Middleware;

use Closure;

class PersonalAdministrativo
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
        f(Auth::user()->isPersonalAdministrativo() || Auth::user()->isAdministrador())
            return $next($request);
        else
            return redirect('/');
    }
}
