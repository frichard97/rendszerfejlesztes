<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function make_profile_view(){
        return view('profile/make_profile_view');
    }
    public function profile_view(){
        return view('profile/profile_view');
    }
}
