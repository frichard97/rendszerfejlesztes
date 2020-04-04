<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function products_view(){
        return view('product/products_view');
    }
    function make_product_view(){
        return view('product/make_product_view');
    }
    function make_offer_view(){
        return view('offer/make_offer_view');
    }
}
