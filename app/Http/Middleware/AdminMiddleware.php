<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
// use Alert;

class AdminMiddleware
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
        if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'admin')
            return $next($request);
            // Alert::warning('Unauthorized',401);
        else
            // Alert::error('You need to login first in order to access the page');
            return redirect('/home');        
    }
}
