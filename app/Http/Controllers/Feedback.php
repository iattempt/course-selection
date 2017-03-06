<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Feedback extends Controller
{
    //
    function index() {
        $data['title'] = "Feedback";
        return view('feedback', $data);
    }
}
