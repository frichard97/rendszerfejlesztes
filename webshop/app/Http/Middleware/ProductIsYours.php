<?php

namespace App\Http\Middleware;

use Closure;

class ProductIsYours
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
        $product = Product::find($request['id']);
        if ($product){
            if ($product->user->id == Auth::user()->id) {
                return $next($request);
            } else {
                return redirect("/");
            }
        } else {
            return redirect("/");
        }
    }
}
