<?php

namespace App\Http\Middleware;

use Closure;

class OfferIsYours
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
        $offer = Offer::find($request['id']);
        $product = Product::find($request['id']); // The id of Offer = the id of Product
        if ($offer && ($product->user_id == Auth::user()->id)) {
            return $next($request);
        } else {
            return redirect("/"); 
        }
        
    }
}
