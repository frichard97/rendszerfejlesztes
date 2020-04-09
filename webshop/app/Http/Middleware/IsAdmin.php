<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        $user=User::find($request['id']);
        if ($user && $user->isAdmin()) {
            return $next($request);
        } else {
            return redirect("/"); 
        }
    }
}
