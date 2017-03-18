<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Authority extends Controller
{
    //
    function index() {
        $data['title'] = "Sign in";
        $data['G_SCHOOL'] = "東海";
        $data['G_SCHOOL_WEBSITE'] = "http://www.thu.edu.tw";

        return view('authority', $data);
    }
}
