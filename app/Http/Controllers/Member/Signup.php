<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Signup extends Controller
{
    //
    function index() {
        $data['title'] = "Sign up";
        return view('sign_up', $data);
    }
}
