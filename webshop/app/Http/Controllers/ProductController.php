<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Offer;

class ProductController extends Controller
{
    public function products_view(){
        $products = Auth::user()->products;
        return view('product/products_view',['products'=>$products]);
    }
    public function make_product_view(){
        $categories = Category::all();
        return view('product/make_product_view',['categories' => $categories]);
    }
    public function make_offer_view($id){
        return view('offer/make_offer_view');
    }

    public function delete_product(Request $request)
    {
        $product = Product::find($request['id']);
        if ($product) {
            if (!Offer::find($product->id)) {
                $product->delete();
                Session::flash('success', 'A terméket sikeresen töröltük. :)');
                return back();
            } else {
                Session::flash('failed', 'A termék meg van hirdetve, így nem tudjuk törölni. :(');
                return back();
            }
        } else {
            Session::flash('failed', 'A termék nem létezik, így nem tudjuk törölni. :(');
            return back();
        }
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
            return back()->withErrors($validator);
        }
        else
        {
            $categories = Category::find($request['categories']);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product = Product::create([
                'name' => $request['name'],
                'description' => $request['description'],
                'price' => $request['price'],
                'quantity' => $request['quantity'],
                'user_id' => Auth::user()->id,
                'image' => $imageName,
            ]);
            $product->categories()->attach($categories);
            return redirect('/');
        }
    }

    public function product_view($id)
    {
        $product = Product::find($id);
        return view('product/product_view',['product' => $product]);
    }

}
