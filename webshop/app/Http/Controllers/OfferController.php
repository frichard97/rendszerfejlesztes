<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function offer_view(){
        return view('offer/offer_view');
    }
    public function create_offer(Request $request){

    }
}
