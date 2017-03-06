<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Signin extends Controller
{
    //
    function index() {
        $data['title'] = "Sign in";
        return view('sign_in', $data);
    }
}
