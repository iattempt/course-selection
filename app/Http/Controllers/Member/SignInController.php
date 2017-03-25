<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignInController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->data['title'] = "Sign in";
    }
    function index() {
        return view('member/sign_in', $this->data);
    }
}
