<?php

namespace App\Http\Controllers;

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
        return view('sign_out', $this->data);
    }
}
