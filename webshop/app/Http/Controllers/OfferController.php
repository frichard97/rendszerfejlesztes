<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function offer_view(){
        return view('offer/offer_view');
    }
    public function create_offer(Request $request){
        $validator = Validator::make($request->all(),[
            'product_id' => 'required',
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
            Profile::create([
                'product_id' => $request['product_id'],
                'end_date' => $request['end_date'],
                'visibility' => $request['visibility'],
                'currentprice' => $request['currentprice'],
                'status' => $request['status']
        ]);
        return redirect('/');
        }
    }
}
