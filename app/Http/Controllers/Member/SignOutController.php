<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignOutController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->data['title'] = "Sign out";
    }
    function index() {
        return view('member/sign_out', $this->data);
    }
}
