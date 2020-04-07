<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function products_view(){
        return view('product/products_view');
    }
    public function make_product_view(){
        return view('product/make_product_view');
    }
    public function make_offer_view(){
        dd(Auth::user()->white_offers);
        return view('offer/make_offer_view');
    }

    public function delete_product(Request $request)
    {
        $product = Product::find($request['id']);
        if ($product) {
            if (!Offer::find($product->id)) {
                $product->delete();
                Session::flash('success', 'A terméket sikeresen töröltük. :)');
                return redirect('/');
            } else {
                Session::flash('failed', 'A termék meg van hirdetve, így nem tudjuk törölni. :(');
                return redirect('/');
            }
        } else {
            Session::flash('failed', 'A termék nem létezik, így nem tudjuk törölni. :(');
            return redirect('/');
        }
    }

    public function create_product(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'name' => 'required',
                'description' => 'required',
                'price' =>'required',
                'quantity' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        else
        {
            Profile::create([
                'name' => $request['name'],
                'description' => $request['description'],
                'price' => $request['price'],
                'quantity' => $request['quantity'],
                'user_id' => Auth::user()->id
            ]);
            return redirect('/');
        }
    }

    public function product_view($id)
    {
        return view('product/product_view');
    }

}
