<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Licit;
use App\Product;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Offer;
use App\User;
use Illuminate\Support\Facades\Validator;

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
        ]);
         if($validator->fails()){
             return back()->withErrors($validator);
        }
        else
        {
            $product = Product::find($product_id);
            $visibility = $request['visibility'] == "on" ? 1: 0;
            Offer::create([
                'product_id' => $product_id,
                'end_date' => $request['end_date'],
                'visibility' => $visibility,
                'currentprice' => $product->price/2,
        ]);
        return redirect('/');
        }
    }
    public function new_comment(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'message' => 'required',
            'id' => 'required',
        ]);
        if($validator->fails())
        {
            return "notok";
        }
        else {
            Comment::create([
                'offer_id' => $request['id'],
                'user_id' => Auth::user()->id,
                'message' => $request['message'],
            ]);
            return "ok";
        }

    }
    public function get_comment(Request $request)
    {
        if($request['type'] == "phase1") {
            $offer = Offer::find($request['id']);
            $comment = $offer->comments;
            return count($comment);
        }
        if($request['type'] == "phase2") {
            $offer = Offer::find($request['id']);
            $comment_count = count($offer->comments);
            $frontendcount = $request['comment_number'];
            $comments = $offer->comments()->get();
            $sorted = $comments->sortByDesc('created_at')->take($comment_count - $frontendcount);
            $returndata = collect();
            foreach ($sorted as $sort)
            {
                $returndata->push([
                   'message' => $sort->message,
                   'user' => User::find($sort->user_id)->profile->getFullName(),
                    'date' => $sort->created_at,

                ]);
            }
            return $returndata->all();
        }
    }
    public function new_licit(Request $request)
    {
        $o = Offer::find($request['id']);
        if($o->end_date < Carbon::now())
        {
            return "nok";
        }
        $validator = Validator::make($request->all(),[
            'id' => 'required',
            'price' => 'required|numeric',

        ]);
        if($validator->fails())
        {
            return "nok";
        }
        else
        {
            $licit = Offer::find($request['id'])->licits()->get();

            if(count($licit) != 0)
            {
                //$licit = $licit->sortByDesc('price')->first();
                if($o->currentprice >= $request['price'])
                {
                    return "nok";
                }
                else {
                    $l = Licit::create([
                        'offer_id' => $request['id'],
                        'user_id' => Auth::user()->id,
                        'price' => $request['price']
                    ]);
                    $o->currentprice = $l->price;
                    $o->save();
                    return "OK";
                }
            }
            else
            {
                if($o->currentprice >= $request['price']) {
                    return "nok";
                }
                else {
                    $l = Licit::create([
                        'offer_id' => $request['id'],
                        'user_id' => Auth::user()->id,
                        'price' => $request['price']
                    ]);
                    $o->currentprice = $l->price;
                    $o->save();
                    return "OK";
                }
            }

        }

    }
    public function get_licit(Request $request)
    {
        if($request['type'] == "phase1") {
            $offer = Offer::find($request['id']);
            $licits = $offer->licits;
            return count($licits);
        }
        if($request['type'] == "phase2"){
            $offer = Offer::find($request['id']);
            $licit_count = count($offer->licits);
            $frontend_count = $request['licit_number'];
            $sorted = $offer->licits()->get()->sortByDesc('created_at')->take($licit_count - $frontend_count);
            $returndata = collect();
            foreach($sorted as $s)
            {
                $returndata->push([
                   'user' => $s->user->profile->getFullName(),
                   'price' => $s->price,
                   'date' => $s->created_at,
                ]);
            }
            return $returndata;
        }
    }
}
