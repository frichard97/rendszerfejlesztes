<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products_view(){
        return view('product/products_view');
    }
    public function make_product_view(){
        return view('product/make_product_view');
    }
    public function make_offer_view(){
        return view('offer/make_offer_view');
    }
    public function delete_product(Request $request)
    {

    }
    public function create_product(Request $request)
    {

    }
    public function product_view($id)
    {
        return view('product/product_view');
    }

}
