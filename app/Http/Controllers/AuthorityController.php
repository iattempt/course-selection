<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorityController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "authority";
    }
    function index() {
        return view('authority', ['general' => $this->general]);
    }
}
