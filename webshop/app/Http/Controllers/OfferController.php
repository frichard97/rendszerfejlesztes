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
use App\Notification;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    public function offer_view()
    {
        $offers = Auth::user()->offers;
        return view('offer/offer_view', ['offers' => $offers]);
    }

    public function create_offer(Request $request, $product_id)
    {
        $validator = Validator::make($request->all(), [
            'end_date' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $product = Product::find($product_id);
            $visibility = $request['visibility'] == "on" ? 1 : 0;
            $offer = Offer::create([
                'product_id' => $product_id,
                'end_date' => $request['end_date'],
                'visibility' => $visibility,
                'currentprice' => $product->price / 2,
            ]);
            if ($visibility) {
                foreach ($request['emails'] as $email) {
                    $attach_user = User::all()->where('email', '=', $email)->first();
                    if ($attach_user) {
                        $attach_user->white_offers()->attach($offer);
                    }
                }
            }
            return redirect('/');
        }
    }

    public function new_comment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required',
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            return "notok";
        } else {
            Comment::create([
                'offer_id' => $request['id'],
                'user_id' => Auth::user()->id,
                'message' => $request['message'],
            ]);
            return "ok";
        }

    }

    public function getAuthority($offer)
    {
        if ($offer->visiblity == 0) {
            return true;
        } else {
            $users = $offer->white_users;
            foreach ($users as $user) {
                if ($user->id == Auth::user()->id) {
                    return true;
                }
            }
        }
        return false;
    }

    public function get_comment(Request $request)
    {
        $ok = false;
        if ($request['type'] == "phase1") {
            $offer = Product::find($request['id'])->offer;
            if ($this->getAuthority($offer)) {
                $comment = $offer->comments;
                return count($comment);
            } else {
                return "noaccess";
            }
        }
        if ($request['type'] == "phase2") {
            $offer = Product::find($request['id'])->offer;
            if($this->getAuthority($offer)) {
                $comment_count = count($offer->comments);
                $frontendcount = $request['comment_number'];
                $comments = $offer->comments()->get();
                $sorted = $comments->sortByDesc('created_at')->take($comment_count - $frontendcount);
                $returndata = collect();
                foreach ($sorted as $sort) {
                    $returndata->push([
                        'message' => $sort->message,
                        'user' => User::find($sort->user_id)->profile->getFullName(),
                        'date' => $sort->created_at,

                    ]);
                }
                return $returndata->all();
            }
            else
            {
                return "noaccess";
            }
        }
    }

    public function new_licit(Request $request)
    {
        $o = Product::find($request['id'])->offer;
        if ($o->end_date < Carbon::now()) {
            return "outoftime";
        }
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'price' => 'required|numeric',

        ]);
        if ($validator->fails()) {
            return "nok";
        } else {
            $licit = Product::find($request['id'])->offer->licits()->get();
            if ($this->getAuthority($o)) {
                if (count($licit) != 0) {
                    //$licit = $licit->sortByDesc('price')->first();
                    if ($o->currentprice >= $request['price']) {
                        return "lowprice";
                    } else {
                        $l = Licit::create([
                            'offer_id' => $request['id'],
                            'user_id' => Auth::user()->id,
                            'price' => $request['price']
                        ]);
                        $o->currentprice = $l->price;
                        $o->save();
                        //Subscribe for notification
                        $me = Auth::user()->id;
                        $ws = $o->wish_users;
                        foreach ($ws as $u) {
                            if ($me == $u->id) {
                            } else {
                                Notification::create([
                                    'name' => "Új licit",
                                    'user_id' => $u->id,
                                    'offer_id' => $request['id'],
                                    'comment' => "Új licitálás történt, ".$l->price." Ft összegben.",
                                    'seen' => 0
                                ]);
                            }
                        }

                        return "OK";
                    }
                } else {
                    if ($o->currentprice >= $request['price']) {
                        return "nok";
                    } else {
                        $l = Licit::create([
                            'offer_id' => $request['id'],
                            'user_id' => Auth::user()->id,
                            'price' => $request['price']
                        ]);
                        $o->currentprice = $l->price;
                        $o->save();
                        //Subscribe for notification
                        $me = Auth::user()->id;
                        $ws = $o->wish_users;
                        foreach ($ws as $u) {
                            if ($me == $u->id) {
                            } else {
                                Notification::create([
                                    'name' => "Új licit",
                                    'user_id' => $u->id,
                                    'offer_id' => $request['id'],
                                    'comment' => "Új licitálás történt, ".$l->price." Ft összegben.",
                                    'seen' => 0
                                ]);
                            }
                        }

                        return "OK";
                    }
                }

            }
            else
            {
                return "noaccess";
            }
        }

    }

    public function get_licit(Request $request)
    {
        if ($request['type'] == "phase1") {

            $offer = Product::find($request['id'])->offer;
            if($this->getAuthority($offer)) {
                $licits = $offer->licits;
                return count($licits);
            }
            else
            {
                return "noaccess";
            }
        }
        if ($request['type'] == "phase2") {
            $offer = Product::find($request['id'])->offer;
            if($this->getAuthority($offer)) {
                $licit_count = count($offer->licits);
                $frontend_count = $request['licit_number'];
                $sorted = $offer->licits()->get()->sortByDesc('created_at')->take($licit_count - $frontend_count);
                $returndata = collect();
                foreach ($sorted as $s) {
                    $returndata->push([
                        'user' => $s->user->profile->getFullName(),
                        'price' => $s->price,
                        'date' => $s->created_at,
                    ]);
                }
                return $returndata;
            }
            else
            {
                return "noaccess";
            }
        }
    }

    public function subscribe(Request $request, $id) {
        $user = Auth::user();
        $offer = Product::find($id)->offer;

        if ($offer) {
            if ($this->getAuthority($offer)) {

                $wishusers = $offer->wish_users;
                $subscribed = true;
                foreach($wishusers as $ws) {
                    if($user->id == $ws->id) {
                        $subscribed = false;
                    }
                }
                if ($subscribed){
                    $user->wish_offers()->attach($offer);
                } else {
                    $user->wish_offers()->detach($offer);
                }
            }
        }

        return back();
    }
    public function get_notification(Request $request){
        if($request['type'] == "phase1"){
            $notifications = Auth::user()->notifications;
            $count = 0;
            foreach ($notifications as $n){
                if(!$n->seen)
                {
                    $count++;
                }
            }
            return  ["notification_number"=>count($notifications),
                    "unseen" =>  $count];
        }
        if($request['type'] == "phase2"){
            $frontend_notification_number = $request['notification_number'];
            $backend_notification_number =  count(Auth::user()->notifications);
            $notifications = Auth::user()->notifications()->get()->sortByDesc('created_at')->take($backend_notification_number - $frontend_notification_number);
            $returndata = collect();
            foreach ($notifications as $n) {
                $returndata->push([
                    'comment' => $n->comment,
                    'name' => $n->name,
                    'date' => $n->created_at,
                    'href' => route('product_view',$n->offer->product->id)
                ]);
            }
            return $returndata;
        }
    }
    public function notification_make_seen(Request $request)
    {
        $notifications = Auth::user()->notifications;
        foreach($notifications as $n)
        {
            $n->seen = 1;
            $n->save();
        }
    }
}
