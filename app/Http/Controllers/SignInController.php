<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignInController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Sign in";
    }
    function index() {
        return view('sign_in', ['general' => $this->general]);
    }
    function verify() {

    }
}
