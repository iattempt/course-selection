<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Feedback";
    }
    function index() {
        if (Auth::check()) {
            $this->general->identity = Auth::user()->getType();
            return view('common/feedback', ['general' => $this->general]);
        }
        return redirect('sign_in'); 
    }
}
