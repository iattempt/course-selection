<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignOut extends Controller
{
    //
    function index() {
        $data['title'] = "Sign out";
        $data['G_SCHOOL'] = "東海";
        $data['G_SCHOOL_WEBSITE'] = "http://www.thu.edu.tw";

        return view('member/sign_out', $data);
    }
}
