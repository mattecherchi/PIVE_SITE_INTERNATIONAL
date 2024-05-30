<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;

class FileSecu
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
        if(!session('isAdmin')){
            if($request->uid!=session('uid')){
            abort(403);
            }
        }
        return $next($request);
    }
}
