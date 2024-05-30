<?php

namespace App\Http\Middleware;

use Closure;

class EditeurOrAdmin
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
        if(!session('isAdmin') && !session('isEditeur')){
            abort(403);
        }
        return $next($request);
    }
}
