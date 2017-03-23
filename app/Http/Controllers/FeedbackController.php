<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    //
    function index() {
        $data['title'] = "Feedback";
        $data['G_SCHOOL'] = "東海";
        $data['G_SCHOOL_WEBSITE'] = "http://www.thu.edu.tw";

        return view('feedback', $data);
    }
}
