<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create_profile_view(){
        return view('profile/create_profile_view');
    }
}
