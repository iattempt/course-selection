<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->data['title'] = "Feedback";
    }
    function index() {
        return view('feedback', $this->data);
    }
}
