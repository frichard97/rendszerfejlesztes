<?php

namespace App\Http\Middleware;

use App\Product;
use Closure;
use Illuminate\Support\Facades\Auth;

class ProductViewExistsOffer
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
        $product = Product::find($request->route()->parameters()['id']);
        if($product) {
            if($product->offer) {
                return $next($request);
            }
            else
            {
                if(Auth::check())
                {
                    if($product->user_id == Auth::user()->id)
                    {
                        return $next($request);
                    }
                    else
                    {
                        return back();
                    }
                }
                else
                {
                    return back();
                }
            }
        }
        else
        {
            return back();
        }
    }
}
