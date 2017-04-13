<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorityController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->general->identity = "authority";
        $this->general->title = "authority";
    }
    function index(Request $request) {
        return view('authority', ['general' => $this->general]);
    }
}
