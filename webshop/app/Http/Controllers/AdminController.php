<?php

namespace App\Http\Controllers;

use App\Category;
use App\Offer;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function user_view($id)
    {
        return view('user/user_view');
    }

    public function users_view()
    {
        $users = User::all();
        return view('user/users_view',['users' => $users]);
    }

    public function categories_view()
    {
        $categories = Category::all();
        return view('category/categories_view',['categories' => $categories]);
    }

    public function delete_category(Request $request)
    {

    }

    public function modify_category(Request $request)
    {

    }

    public function create_category(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        else
        {
            Category::create([
               'name' => $request['name']
            ]);
            Session::flash('success','A kategoria sikeresen hozzáadva');
            return back();
        }
    }
}
