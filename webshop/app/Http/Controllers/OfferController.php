<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    public function offer_view(){
        $offers = Auth::user()->offers;
        return view('offer/offer_view',['offers' =>$offers]);
    }
    public function create_offer(Request $request, $product_id){
        $validator = Validator::make($request->all(),[
            'end_date' => 'required',
            'visibility' =>'required',
            'currentprice' => 'required',
            'status' => 'required'
        ]);
         if($validator->fails()){
             return back()->withErrors($validator);
        }
        else
        {
            Offer::create([
                'product_id' => $product_id,
                'end_date' => $request['end_date'],
                'visibility' => $request['visibility'],
                'currentprice' => 0,
                'status' => $request['status']
        ]);
        return redirect('/');
        }
    }
}
