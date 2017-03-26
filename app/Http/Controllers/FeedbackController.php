<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->genral->title = "Feedback";
    }
    function index() {
        return view('feedback', ['general' => $this->general]);
    }
}
