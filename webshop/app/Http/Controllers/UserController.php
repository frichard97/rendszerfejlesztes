<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    public function make_profile_view(){
        return view('profile/make_profile_view');
    }
    public function profile_view(){
        $profile = Auth::user()->profile;
        return view('profile/profile_view',['profile'=>$profile]);
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
        $validator = Validator::make($request->all(),[
           'current_password' => 'required',
           'new_password' => 'required',
           'new_password_again' => ['required','same:new_password'],
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        else
        {
            if(Hash::check($request['current_password'], Auth::user()->password)){
                if($request['current_password'] == $request['new_password'])
                {
                    Session::flash('failed', 'Nem egyezhet a régi jelszó az új jelszóval');
                    return back();
                }
                $user = Auth::user();
                $user->password = Hash::make($request['new_password']);
                $user->save();
                Session::flash('success', 'Sikeres jelszó változtatás!');
                return back();
            }
            else{
                return back()->withErrors(['current_password' => "Rossz jelszó"]);
            }
        }
    }
    public function new_address(Request $request){

    }
}
