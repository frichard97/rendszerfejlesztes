<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function user_view($id){
        return view('user/user_view');
    }
    public function users_view(){
        return view('user/users_view');
    }
    public function categories_view(){
        return view('category/categories_view');
    }
    public function make_category_view(){
        return view('category/make_category_view');
    }
}
