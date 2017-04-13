<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignOutController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Sign out";
    }
    function index(Request $request) {
        return view('sign_out', ['general' => $this->general]);
    }
}
