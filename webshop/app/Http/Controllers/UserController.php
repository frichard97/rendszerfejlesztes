<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                'lastname' => 'required',
                'firstname' => 'required',
                'postcode' =>'required',
                'place' => 'required',
                'street' => 'required',
                'number' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        else
        {
            Profile::create([
                'user_id' => Auth::user()->id,
                'lastname' => $request['lastname'],
                'firstname' => $request['firstname'],
                'postcode' => $request['postcode'],
                'place' => $request['place'],
                'street' => $request['street'],
                'number' => $request['number'],
            ]);
            return redirect('/');
        }
    }
    public function new_password(Request $request){
        return "OK";
    }
    public function new_address(Request $request){

    }
}
