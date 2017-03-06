<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Signout extends Controller
{
    //
    function index() {
        $data['title'] = "Sign out";
        return view('sign_out', $data);
    }
}
