<?php

namespace App\Http\Middleware;
use App\user;
use Closure;

class UserExist
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
        $id = $request->route()->parameters()['id'];
        $user = User::find($id);
        if($user) {
            return $next($request);
        } else {
            return redirect("/");
        }
    }
}
