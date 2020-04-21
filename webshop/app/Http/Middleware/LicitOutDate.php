<?php

namespace App\Http\Middleware;

use App\Offer;
use Carbon\Carbon;
use Closure;

class LicitOutDate
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
        $offer = Offer::find($id);
        if($offer->end_date > Carbon::now()) {
            return $next($request);
        }
        else
        {
            return "nok";
        }
    }
}
