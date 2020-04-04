<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function make_profile_view(){
        return view('profile/make_profile_view');
    }
    public function profile_view(){
        return view('profile/profile_view');
    }
    public function create_profile(Request $request){
        $validator = Validator::make($request->all(),[
                'vnev' => 'required',
                'knev' => 'required',
                'iranyito_szam' =>'required',
                'haz_szam' => 'required',
                'utca' => 'required',
                'helyseg_nev' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        else
        {
            //TODO create profile
            return redirect('/');
        }
    }
}
