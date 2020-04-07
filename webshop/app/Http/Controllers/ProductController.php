<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    }
    public function create_product(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'name' => 'required',
                'description' => 'required',
                'price' =>'required',
                'quantity' => 'required',
                'image' => ['required','image','max:2048'],
        ]);
        if($validator->fails()){
            dd($validator);
            return back()->withErrors($validator);
        }
        else
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            Product::create([
                'name' => $request['name'],
                'description' => $request['description'],
                'price' => $request['price'],
                'quantity' => $request['quantity'],
                'user_id' => Auth::user()->id,
                'image' => $imageName,
            ]);
            return redirect('/');
        }
    }
    public function product_view($id)
    {
        return view('product/product_view');
    }

}
