<?php

namespace App\Http\Controllers;

use App\Comment;
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
}
